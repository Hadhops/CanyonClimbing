import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);


const setContent = (block, index) => {

    block.isAnimating = true

    let content = block.tabsContent[index]
    let target = block.querySelector('.block-img-bg-t__content')

    // set content
    while (target.hasChildNodes()) {
        target.removeChild(target.firstChild);
    }
    target.insertAdjacentHTML('afterbegin', content.html)
    ScrollTrigger.refresh(true)

    //set background
    block.innerHTML += content.img

    let images = block.querySelectorAll('.block-img-bg-t__bg')
    let oldImg, newImg

    if(images.length > 1){
        oldImg = images[0]
        newImg = images[1]
    } else {
        newImg = images[0]
    }

    gsap.to(newImg, {autoAlpha: 1, onComplete: () => {
        ScrollTrigger.refresh(true)
    }})
    if(oldImg){
        gsap.to(oldImg, {autoAlpha: 0, onComplete: () => {
            oldImg.remove();
        }})
    }

    //set toggle indicator
    let toggles = block.querySelectorAll('.block-img-bg-t__toggles p')
    let toggleCurrent = block.querySelector('.block-img-bg-t__toggles p.current')
    let newToggle = toggles[index]
    let indicator = block.querySelector('.block-img-bg-t__indicator')
    let marker = block.querySelector('.block-img-bg-t__marker')
    let newTogglePos = newToggle.getBoundingClientRect()
    let markerPos = marker.getBoundingClientRect()
    let indicatorPos = indicator.getBoundingClientRect()

    let scaleX = newTogglePos.width / indicatorPos.width
    let translateX = newTogglePos.x - markerPos.x 

    const setCurrent = () => {
        toggles.forEach((toggle, i) => {
            if(index === i){
                toggle.classList.add('current')
            } else {
                toggle.classList.remove('current')
            }
        })
        gsap.set(marker, {scaleX: 0, translateX: 0})
        block.isAnimating = false
    }

    //animate
    if(toggleCurrent){
        let toggleCurrentPos = toggleCurrent.getBoundingClientRect()
        let startScale = toggleCurrentPos.width / indicatorPos.width
        let startTrans = toggleCurrentPos.x - markerPos.x

        gsap.set(marker, { scaleX: startScale, translateX: startTrans })
    }
    toggles.forEach(toggle => { toggle.classList.remove('current') })
    gsap.to(marker, { scaleX: scaleX, translateX: translateX, onComplete: () => setCurrent() })  

}

export const setupImageBackgroundTabs = () => {

    document.querySelectorAll('.block-img-bg-t').forEach((block) => {

        block.tabsContent = []
        block.inAnimating = false

        let tabs = block.querySelectorAll('.block-img-bg-t__tab')

        tabs.forEach((tab) => {
            block.tabsContent.push({
                img: tab.getAttribute('data-tab-image-html'), 
                html: tab.innerHTML
            })
        })

        tabs[0].parentNode.innerHTML = '';

        //set inital background & content
        setContent(block, 0)

    })

}

export const toggleImageBackgroundTab = (target) => {

    
    let block = target.closest('.block-img-bg-t')
    let index = target.getAttribute('data-toggle-bg-t-content') - 1

    if(block.isAnimating) return;

    setContent(block, index)

}
