class verySimpleSlider {
    constructor(
        slider,
        options = {}
    )
    {
        this.initialization(slider, options);
    }

    initialization(slider, options) {
        this.slider = document.querySelector(slider);
        if (this.slider === null) {
            return;
        }
        this.isActiveSlider = false;
        this.selector = slider;
        this.sliderChildren = document.querySelector(slider).children;
        this.sliderItems = [...this.sliderChildren];
        this.options = options;
        this.sliderWidth  =  null;
        this.sliderHeight = null;
        this.sliderItemWidth = null;
        this.sliderTrack = null;
        this.sliderTrackPos = 0;
        this.sliderTrackStep = null;
        this.initialItems = this.options.items;
        this.counter = 0;
        this.numOfItems = this.sliderItems.length;
        this.start();
    }

    start() {
        this.resize();
        this.IsActive();
        this.responsive();

        this.addSliderTrack();
        this.defaultValues();
        this.defaultStyles();
        this.setSliderWidthAndHeight();
        this.calcSliderTrackStep();


        this.clickOnRightBtn();
        this.clickOnLeftBtn();
        this.autoScroll();
    }

    resize() {

        window.addEventListener('resize', () => {
            this.IsActive();
            this.responsive();

            this.setSliderWidthAndHeight();
        
            this.calcSliderTrackStep();
           
            // resetSlider
            this.sliderTrackPos = 0;
            this.counter = 0;
            this.sliderTrackAnim(this.sliderTrackPos);
        });
    }

    IsActive() {

        let {activateSliderWhen} = this.options;

        let screenWidth = document.documentElement.clientWidth;

        if (
                screenWidth <= activateSliderWhen || 
                activateSliderWhen === undefined ||
                typeof activateSliderWhen !== 'number'
            ) 
            {
                if(!this.isActiveSlider) {
                    this.isActiveSlider = true;
                    this.addSliderTrack();
                }else {
                    return;
                }
            }else if(screenWidth > activateSliderWhen) {
                if(this.isActiveSlider) {
                    this.isActiveSlider = false;
                    this.removeSliderTrack();
                }else {
                    return;
                }
            }
    }

    addSliderTrack() {
        if(this.sliderTrack === null) {
            const htmlSliderTrack = document.createElement('div');
            this.slider.append(htmlSliderTrack);
            this.sliderItems.forEach(item => {
                htmlSliderTrack.append(item);
            }); 
            this.sliderTrack = htmlSliderTrack;
            this.removeSliderTrack();
        }else {
            this.slider.append(this.sliderTrack);
            this.sliderItems.forEach(item => {
                this.sliderTrack.append(item);
            });
            this.setSliderWidthAndHeight();
            this.slider.style.background = 'transparent';    
            this.slider.style.position = 'relative';
            this.slider.style.overflow = 'hidden';
        }
        
    }
    removeSliderTrack() {
        this.sliderTrack.remove();
        this.sliderItems.forEach(item => {
            this.slider.append(item);
        });
        this.slider.style = ''; 
    }

    defaultValues() {

        let defaultValues = {
            items: 1,
            itemsGap: 20,
            btnLeft: false,
            btnRight: false,
            animTime: 500,
            autoScroll: false,
            autoScrollTime: 3000,
            stepItemsAll: false,
            stopAutoScrollWhenMouseOnElement: this.selector,
            // activateSliderWhen: false 
        };

        for(let key in defaultValues) {
            if(this.options[key] === undefined) {
                this.options[key] = defaultValues[key];
            }  
        }
    //  console.log(this.options);
    }

    defaultStyles() {

        let {itemsGap, animTime} = this.options;
        let centerEl = 
        (this.sliderWidth - 
        (this.sliderWidth - itemsGap)) / 2;
        

        function calcTrtransition() {
            let styleTransition;
            let RoundingAnimTime = 
                Math.round(animTime / 100) * 100;
    
            if(animTime <= 999) {
                styleTransition = 
                    `.${RoundingAnimTime / 100}s`;

            }else if (animTime > 999) {
                styleTransition = 
                    `${Math.floor(RoundingAnimTime / 999)}s`;
            }
            return  styleTransition;
        }

        if (this.isActiveSlider) {
            this.setSliderWidthAndHeight();
            this.slider.style.background = 'transparent';    
            this.slider.style.position = 'relative';
            this.slider.style.overflow = 'hidden';
        }
        this.sliderTrack.style.display = 'flex';
        this.sliderTrack.style.left = `${centerEl}px`;
        this.sliderTrack.style.position = 'absolute';
        this.sliderTrack.style.transition = calcTrtransition();
        this.sliderTrack.style.columnGap = `${itemsGap}px`;
    }

    setSliderWidthAndHeight() {
        let {items, itemsGap} = this.options;

        this.sliderWidth = 
            this.sliderItems[0].offsetWidth * 
            items +
            itemsGap * items;

        this.sliderHeight = this.sliderItems[0].offsetHeight;

        this.sliderItemWidth = 
            this.sliderItems[0].offsetWidth + itemsGap;


        if (!this.isActiveSlider) {
            this.slider.style.width = '';
            this.slider.style.height = '';
            return;
        }
        
        this.slider.style.width = `${this.sliderWidth}px`;
        this.slider.style.height = `${this.sliderHeight}px`;
        
    }

    oddParityAdjustment(direction) {

        let {items, stepItemsAll} = this.options;

        let preCounter = this.stepItemsAllChecker() - 1;
        
        let isInteger = (this.numOfItems) / items;
        let remainderOfItems = 
            items - (this.numOfItems % items);

        // console.log(isInteger % 2);
        if (
                !stepItemsAll || 
                items === this.numOfItems || 
                isInteger % 2 === 0 ||
                isInteger % 2 === 1
            ) 
        {
            return;
        }
        

        if (preCounter === 0 && direction === 'right') {
            this.sliderTrackPos += 
                this.sliderItemWidth * remainderOfItems;
            return;
        }else if (preCounter === 0 && direction === 'left') {
            
            if (this.counter === 0) {
                this.sliderTrackPos = 0;
                this.sliderTrackStep = 0;
                return;
            }

            this.sliderTrackPos = 
                -(this.sliderTrackStep) * 
                (this.stepItemsAllChecker() + 1);

            this.sliderTrackPos += 
                this.sliderItemWidth * remainderOfItems;
            return;
        }


        if(direction === 'right') {
            if (isInteger % 2 !== 0 && stepItemsAll) {

                if (this.counter === preCounter) {
                    this.sliderTrackPos += 
                        this.sliderItemWidth * remainderOfItems;
                }
            
            }
        }else if (direction === 'left') {
            if (isInteger % 2 !== 0 && stepItemsAll) {
                if (
                        this.counter === preCounter - 1
                    ) 
                {
                    this.sliderTrackPos -= 
                    (this.sliderItemWidth * remainderOfItems);

                }else if (this.counter === -1) {
                    this.sliderTrackPos += 
                    (this.sliderItemWidth * remainderOfItems);
                }
            }
        }
    } 

    calcSliderTrackStep() {
        let {items, stepItemsAll} = this.options;

        if (stepItemsAll && items > 1) {
            this.sliderTrackStep = this.sliderWidth;
            return;
        }

        if (items > 1) {
            this.sliderTrackStep = 
                (this.sliderWidth - this.sliderItemWidth) / (items - 1);
        }else {
            this.sliderTrackStep = this.sliderItemWidth;
        }

    }

    clickOnRightBtn() {
        let {items, btnRight} = this.options;
        if(btnRight) {
            const btn = document.querySelector(btnRight);
            btn.addEventListener('click', ()=> {
                this.moveRight(this.counter++);
            });
        }
    }

    clickOnLeftBtn() {
        let {btnLeft} = this.options;
        if (btnLeft) {
            const btn = document.querySelector(btnLeft);
            btn.addEventListener('click', ()=> {
                this.moveLeft(this.counter--);
            });
        }
    }

    sliderTrackAnim(trackPos) {
        this.calcSliderTrackStep();
        this.sliderTrack.style.transform = `translate(${trackPos}px)`;
    }

    // Для условия в moveRight и moveLeft
    stepItemsAllChecker() {
        let {items, stepItemsAll} = this.options;

        if (stepItemsAll && items > 1) {
            return Math.ceil(this.numOfItems / items - 1);
        }
        return this.numOfItems - items;
    }

    moveRight() {
        this.oddParityAdjustment('right');
        if(this.counter > this.stepItemsAllChecker()) {
            this.sliderTrackPos = 0;
            this.counter = 0;
            this.sliderTrackAnim(this.sliderTrackPos);
        }else {
            this.sliderTrackPos -= this.sliderTrackStep;
            this.sliderTrackAnim(this.sliderTrackPos);
        }
        // this.oddParityAdjustment('right');
    }

    moveLeft() {
        let {items, stepItemsAll} = this.options;
        if(this.counter === -1) {
            this.sliderTrackPos = 
                -(this.sliderTrackStep) * 
                (this.stepItemsAllChecker() + 1);
            this.oddParityAdjustment('left');

            if(stepItemsAll && items > 1) {
                this.counter = this.stepItemsAllChecker();
            }else {
                this.counter = this.numOfItems - items;
            }
        }
        this.oddParityAdjustment('left');
        this.sliderTrackPos += this.sliderTrackStep;
        this.sliderTrackAnim(this.sliderTrackPos);
    }

    autoScroll() {

        let {
            btnLeft,
            btnRight,
            autoScrollTime,
            stopAutoScrollWhenMouseOnElement,
        } = this.options;

        if(btnRight === false && btnLeft === false) {
            this.options.autoScroll = true;
        }

        let {autoScroll} = this.options;
        
        const onThatEl = 
            document.querySelector(stopAutoScrollWhenMouseOnElement);

        if(autoScroll) {
            let autoWipe = setInterval(()=> {
                this.moveRight(this.counter++);
            },  autoScrollTime);

            if(stopAutoScrollWhenMouseOnElement) {
                onThatEl.addEventListener('mouseenter', ()=> {
                    clearInterval(autoWipe);
                });
    
                onThatEl.addEventListener('mouseleave', ()=> {
                    clearInterval(autoWipe);
                        autoWipe = setInterval(()=> {
                            this.moveRight(this.counter++);
                    }, autoScrollTime);
                });
            }
            
        }
    }

    responsive() {
        let screenWidth = document.documentElement.clientWidth;

        const {responsive} = this.options;

        if (this.initialItems === undefined) {
            this.initialItems = 1;
        }

        for(let key in responsive) {
            if (screenWidth <= key) {
                this.options.items = responsive[key].items;
                return;
            }else if (screenWidth > key) {
                this.options.items = this.initialItems;
            }
        }   
    }
}
/////////////////////////////////////////////////////////////

class DudeInfiniteSlider {
    constructor(
        slider,
        options = {}
    ) {
        this.slider = document.querySelector(slider);
        if(this.slider) {
            this.slider.classList.add('DudeInfiniteSlider');
            this.sliderChildren = 
                document.querySelector(slider).children;
            this.sliderItems = [...this.sliderChildren];
            this.sliderBodyWidth = null;
            this.sliderItemsWidth = null;
            this.sliderItemsHeight = null;
            this.options = options;
            this.numOfScreens = this.sliderItems.length;
            this.currentScreen = 0;
            this.inAnim = false;
            this.itemStyleDisplay = 
                getComputedStyle(this.sliderChildren[0]).display;
            this.start();
            this.animTime = this.options.animTime;
        } 
    }

    calcSize() {
        this.sliderItemsWidth = this.sliderItems[0].offsetWidth;
        this.sliderItemsHeight = this.sliderItems[0].offsetHeight;
        this.sliderBodyWidth = this.slider.offsetWidth;
        this.slider.style.width = `${this.sliderItemsWidth}px`;
        this.slider.style.height = `${this.sliderItemsHeight}px`;
    }

    defaultStyles() { 
        // this.slider.style.width = `${this.sliderItemsWidth}px`;
        // this.slider.style.height = `${this.sliderItemsHeight}px`;
        this.slider.style.position = 'relative';
        this.slider.style.overflow = 'hidden';

        this.sliderItems.forEach(item => {
            item.style.position = 'absolute';
            item.style.top = '50%';
            if(getComputedStyle(this.sliderChildren[0]).display === 'list-item') {
                this.itemStyleDisplay = 'block';
            }
        });
    }

    defaultValues() {

        let {
            btnLeft,
            btnRight,
            stopAutoScrollWhenMouseOnElement
        } = this.options;
    

        let defaultValue = {
            btnLeft: false,
            btnRight: false,
            animTime: 500,
            autoScroll: false,
            autoScrollTime: 3000,
            stopAutoScrollWhenMouseOnElement: '.DudeInfiniteSlider' 
        };

        if(!btnLeft && !btnRight) {
            defaultValue.autoScroll = true;
        }

        if(stopAutoScrollWhenMouseOnElement === true) {
            this.options.stopAutoScrollWhenMouseOnElement = 
                '.DudeInfiniteSlider'; 
        }

        for(let key in defaultValue) {
            if(this.options[key] === undefined) {
                this.options[key] = defaultValue[key];
            }  
        }
        // console.log(this.options);
    }

    start() {
        this.resize();
        this.calcSize();
        this.defaultStyles();
        this.defaultValues();

        this.sortPositioning(
            this.sliderItems[this.currentScreen],
            this.sliderItems[this.currentScreen - 1],
            this.sliderItems[this.currentScreen + 1]
        );
    
        this.arrowRightClick();

        this.arrowLeftClick();

        this.autoScroll();
    }

    resize() {
        window.addEventListener('resize', () => {
            this.calcSize();
            this.currentScreen = 0;
            this.sortPositioning(
                this.sliderItems[this.currentScreen],
                this.sliderItems[this.currentScreen - 1],
                this.sliderItems[this.currentScreen + 1]
            );
        });
    }

    autoScroll() {
        let {autoScroll} = this.options;
        let {autoScrollTime} = this.options;
        let {stopAutoScrollWhenMouseOnElement} = this.options;
        const onThatEl = 
            document.querySelector(stopAutoScrollWhenMouseOnElement);

        if(autoScroll) {
            let autoWipe = setInterval(()=> {
                this.startAnim('right');
            },  autoScrollTime);

            if(stopAutoScrollWhenMouseOnElement) {
                onThatEl.addEventListener('mouseenter', ()=> {
                    clearInterval(autoWipe);
                });
    
                onThatEl.addEventListener('mouseleave', ()=> {
                    clearInterval(autoWipe);
                        autoWipe = setInterval(()=> {
                            this.startAnim('right');
                    }, autoScrollTime);
                });
            }
            
        }
    }

    arrowRightClick() {
        let {btnRight}  = this.options;
        const arrowRight = document.querySelector(btnRight);

        if(arrowRight) {
            arrowRight.addEventListener('click', ()=> {
                this.startAnim('right');
            });
        }
       
    }

    arrowLeftClick() {
        let {btnLeft}  = this.options;
        const arrowLeft = document.querySelector(btnLeft);

        if(arrowLeft) {
            arrowLeft.addEventListener('click', ()=> {
                this.startAnim('left');
            });
        }
    }

    sortPositioning(mainScreen, leftScreen, rightScreen) {

    
        if (rightScreen === undefined) {
            rightScreen = this.sliderItems[0];
        }

        if(leftScreen === undefined) {
            leftScreen = this.sliderItems[this.numOfScreens - 1];
        }

        this.sliderItems.forEach(item => {
            item.style.transform = this.calculationTransformTranslate();
            if (item === mainScreen) {
                item.style.display = `${this.itemStyleDisplay}`;
                item.style.left = '0%';
            }else if (item === leftScreen) {
                item.style.display = `${this.itemStyleDisplay}`;
                item.style.left = '-100%';
            }else if (item === rightScreen) {
                item.style.display = `${this.itemStyleDisplay}`;
                item.style.left = '100%';
            }else {
                item.style.display = 'none';
            }
        });
    }

    startAnim(direction) {
        if(!this.inAnim) {
            this.inAnim = true;
            if(direction === 'right') {
                this.moveRight();
            }else if (direction === 'left') {
                this.moveLeft();
            }else {
                this.inAnim = false;
                return;
            }
        }
    }

    moveRight() {
        if(this.currentScreen < this.numOfScreens - 1) {
            this.toLeft(this.sliderItems[this.currentScreen]);
            this.comeRight(this.sliderItems[this.currentScreen + 1]);
            setTimeout(()=> {
                this.inAnim = false;
                this.currentScreen++;
                this.sortPositioning(
                    this.sliderItems[this.currentScreen], 
                    this.sliderItems[this.currentScreen - 1], 
                    this.sliderItems[this.currentScreen + 1]
                );
            }, this.animTime);
        }else {
            this.toLeft(this.sliderItems[this.currentScreen]);
            this.comeRight(this.sliderItems[0]);
            setTimeout(()=> {
                this.inAnim = false;
                this.currentScreen = 0;
                this.sortPositioning(
                    this.sliderItems[this.currentScreen], 
                    this.sliderItems[this.currentScreen - 1], 
                    this.sliderItems[this.currentScreen + 1]
                );
            }, this.animTime);
        }
    }

    moveLeft() {
        if(this.currentScreen > 0) {
            this.toRight(this.sliderItems[this.currentScreen]);
            this.comeLeft(this.sliderItems[this.currentScreen - 1]);
            setTimeout(()=> {
                this.inAnim = false;
                this.currentScreen--;
                this.sortPositioning(
                    this.sliderItems[this.currentScreen], 
                    this.sliderItems[this.currentScreen - 1], 
                    this.sliderItems[this.currentScreen + 1]
                );
            }, this.animTime);
        }else {
            this.toRight(this.sliderItems[this.currentScreen]);
            this.comeLeft(this.sliderItems[this.numOfScreens - 1]);
            setTimeout(()=> {
                this.inAnim = false;
                this.currentScreen = this.numOfScreens - 1;
                this.sortPositioning(
                    this.sliderItems[this.currentScreen], 
                    this.sliderItems[this.currentScreen - 1], 
                    this.sliderItems[this.currentScreen + 1]
                );
            }, this.animTime);
        }
    }


    calculationTrtransition() {
        let styleTransition;
        let RoundingAnimTime = Math.round(this.animTime / 100) * 100;

        if(this.animTime <= 999) {
            styleTransition = `.${RoundingAnimTime / 100}s`;
        }else if (this.animTime > 999) {
            styleTransition = `${Math.floor(RoundingAnimTime / 999)}s`;
        }
        return  styleTransition;
    }

    calculationTransformTranslate(checkNegativeValue) {
    
        let transformTranslate = 
            (this.sliderBodyWidth - this.sliderItemsWidth) / 2;

            if (checkNegativeValue === 'minus') {
                return `translate(${-transformTranslate}%, -50%)`;
            }

        return `translate(${transformTranslate}px, -50%)`;
    }

    toLeft(screen) {
        screen.style.transition = this.calculationTrtransition();
        screen.style.left = '-100%';

        setTimeout(() => {
            screen.style.transition = '';
            screen.style.left = '';
        }, this.animTime);
    }

    toRight(screen) {
        screen.style.transition = this.calculationTrtransition();
        screen.style.left = '100%';
        setTimeout(() => {
        screen.style.transition = '';
        screen.style.left = '';
        }, this.animTime);
    }

    comeRight(screen) {
        screen.style.transition = this.calculationTrtransition();
        screen.style.left = '0%';
        setTimeout(() => {
            screen.style.transform = ''; 
            screen.style.left = '';
        }, this.animTime);
    }

    comeLeft(screen) {
        screen.style.transition = this.calculationTrtransition();
        screen.style.left = '0%';
        setTimeout(() => {
            screen.style.transition = '';
            screen.style.left = '';
        }, this.animTime);
    }

}

////////////////////////////////////////////////////////////



const underNavBar = document.querySelector('.under-nav-bar');
const navMobileWrapper = document.querySelector('.nav-mobile-wrapper');
const navWrapper = document.querySelector('.nav-wrapper');
const barsSolodMobile = document.querySelector('.bars-solod-mobile');
const body = document.querySelector('body');
const opacityEffectMobile = document.querySelector('.opacity-effect-mobile');
let PosTop = 0;
let underNavBarHeight = underNavBar.offsetHeight;

const underNavBarAnimate = ()=> {

    if(window.pageYOffset > 108) {
        underNavBar.style.top = `${PosTop - underNavBarHeight}px`;
    }else if (window.pageYOffset < 108) {
        underNavBar.style.top = `0px`;
    }

    underNavBar.onmouseover = 
    underNavBar.onmouseout = 
    navWrapper.onmouseover = 
    navWrapper.onmouseout = (e) => {
        
    if(e.type == 'mouseover') {
        underNavBar.style.top = '0px';
    }
    
    if (e.type == 'mouseout' && window.pageYOffset > 108) {
        underNavBar.style.top = `${PosTop - underNavBarHeight}px`;
    }
};

};


window.addEventListener('scroll', () => {
    underNavBarAnimate();
});


















// SWIPE MENU

let x1 = null;
let y1 = null;
let x2 = null;
let y2 = null;
let moveBarPx = -250;
let startTime = 0;
let endTime = 0;
let speed = null;
let opacity = 0;
let per = (moveBarPx / 100);
let opacityCounter = 0;


const handleTouchStart = (e)=> {
    const firstTouch = e.touches[0];
    x1 = firstTouch.clientX;
    y1 = firstTouch.clientY;
    navMobileWrapper.style.transition = '';
    // console.log(x1, y1); 
};

const handleTouchMove = (e)=> {
    startTime = e.timeStamp;

    x2 = e.touches[0].clientX;
    y2 = e.touches[0].clientY;
    
    let xDiff = x2 - x1;
    let yDiff = y2 - y1;
    

    if (Math.abs(xDiff) > Math.abs(yDiff)) {
        if (xDiff > 0) {
            if(moveBarPx <= -1) {
                moveBarPx += 5;
                opacityCounter = (moveBarPx / per / 100);
                opacityCounter = (opacityCounter * -1) + 1;
                opacity = opacityCounter;
            }
            
        }else {
            if(moveBarPx >= -249) {
                let opacityPer = opacity / 100;
                moveBarPx -= 5;
                opacityCounter = (moveBarPx / per / 100);
                opacity = opacity / opacityPer / 100;
                opacity -= opacityCounter;   
            }   
        }

        
        navMobileWrapper.style.left = moveBarPx + 'px';
        opacityEffectMobile.style.opacity = opacity;
        
    }
};

const handleEnd = (e) => {
    navMobileWrapper.style.transition = '.5s'; 
    endTime = e.timeStamp;
    if (startTime != 0) {
        speed = (x2 - x1)/(endTime - startTime);
    }
    if (speed > 100 && startTime != 0 && speed != 0) {
        moveBarPx = 0;
    }
    if (speed < -100) {
        moveBarPx = -250;
    }
      
    if (moveBarPx <= -150) {
        moveBarPx = -250;
        opacity = 0;
        body.style.overflow = '';
        opacityEffectMobile.style.pointerEvents = 'none';
    }else {
        moveBarPx = 0;
        opacity = 1;
        body.style.overflow = 'hidden';
        opacityEffectMobile.style.pointerEvents = 'auto';
    }
    
    navMobileWrapper.style.left = moveBarPx + 'px';
    opacityEffectMobile.style.opacity = opacity;
};

function funkClickBtn() {
    navMobileWrapper.style.transition = '.5s'; 
    if (moveBarPx == -250) {
        moveBarPx = 0;
        opacity = 1;
        opacityEffectMobile.style.opacity = opacity;
        body.style.overflow = 'hidden';
        opacityEffectMobile.style.pointerEvents = 'auto';
    }else {
        moveBarPx = -250;
        opacity = 0;
        opacityEffectMobile.style.opacity = opacity;
        body.style.overflow = '';
        opacityEffectMobile.style.pointerEvents = 'none';
    }
    navMobileWrapper.style.left = moveBarPx + 'px';
}

navMobileWrapper.addEventListener('touchstart', handleTouchStart);
navMobileWrapper.addEventListener('touchmove', handleTouchMove);
navMobileWrapper.addEventListener('touchend', handleEnd);
barsSolodMobile.addEventListener('click', funkClickBtn);
opacityEffectMobile.addEventListener('click', ()=> {
    moveBarPx = -250;
    opacity = 0;
    opacityEffectMobile.style.opacity = opacity;
    body.style.overflow = '';
    navMobileWrapper.style.left = moveBarPx + 'px';
    opacityEffectMobile.style.pointerEvents = 'none';
});









//color change in benefits

const registerBtn = document.querySelector('.benefits .btns .register a');
const subscribeBtn = document.querySelector('.benefits .btns .subscribe');
if (registerBtn !== null) {
    subscribeBtn.onmouseover = 
    subscribeBtn.onmouseout = (e) => {
        if(e.type == 'mouseover') {
            registerBtn.style.background = 'black';
        }
        if (e.type == 'mouseout') {
            registerBtn.style.background = '';
        }
    }; 
}

// SUBSCRIBE
const modalSubscibe = document.querySelector('.modal-subscibe');
const modalDarkStyle = document.querySelector('.modal-dark-style');
const modalClose = document.querySelector('.modal-close');

function modalRemove() {
    modalSubscibe.classList.remove('active');
    modalDarkStyle.classList.remove('active');
    body.style.overflowY = 'scroll';
}

if (modalSubscibe) {
    subscribeBtn.addEventListener('click', () => {
        modalSubscibe.classList.add('active');
        modalDarkStyle.classList.add('active');
        body.style.overflowY = 'hidden';
        
    });
    modalDarkStyle.addEventListener('click', modalRemove);
    modalClose.addEventListener('click', modalRemove);
}









//////////////////SLIDERS ///////////////// 

//Infinite sliderSchedule //

const sliderSchedule = new DudeInfiniteSlider(
    '#slider',
    {
        btnLeft:'section.about .arrow-left',
        btnRight: 'section.about .arrow-right',
        autoScroll: true,
        stopAutoScrollWhenMouseOnElement: 'section.about .slider-block'
    }
);


// SLIDER REVIEWS

const sliderReviews = new verySimpleSlider(
    '#slider-reviews',
    { 
        items: 2,
        itemsGap: 30,
        btnLeft: '.customer-reviews .yellow-arrow-left',
        btnRight: '.customer-reviews .yellow-arrow-right',
        autoScroll: true,
        autoScrollTime: 5000,
        responsive: {
            1230: {
                items: 1
            }
        }
    }
);


// OUR CLIENTS SLIDER

const ourClientsSlider = new verySimpleSlider(
    '.our-clients #slider-clients',
    {
        items: 6,
        itemsGap: 15,
        btnLeft: '.our-clients .yellow-arrow-left',
        btnRight: '.our-clients .yellow-arrow-right',
        autoScroll: true,
        autoScrollTime: 5000,
        stopAutoScrollWhenMouseOnElement: false,
        responsive: {
            1230: {
                items: 4
            },
            800: {
                items: 2
            },
            400: {
                items: 1
            }
        }
    }
);

// contacts-list slider

const contactsListSlider = new verySimpleSlider(
    '#contacts-html .contacts-list',
    {
        activateSliderWhen: 1095,
        btnLeft: '#contacts-html .mibile-btns .btn-left',
        btnRight: '#contacts-html .mibile-btns .btn-right'
    }
);



// registration html ACCEPT TERMS
const containerCheckbox = document.querySelector('.accept-checkbox');
const checkbox = document.querySelector('.accept-checkbox input');

if(checkbox) {
    checkbox.addEventListener('click', () => {
        containerCheckbox.classList.toggle('active');
        
    });
}


