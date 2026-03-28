import './_app/polyfils'
import { ScrollTrigger } from "gsap/ScrollTrigger"
import { waitForFinalEvent, matches } from './_app/helpers.js'
import { togglePopover } from './_app/popover'
import { setupGsap } from './_app/gsap'
import { pageSetup, menuHeight } from './_app/page-setup'
import { toggleImageBackgroundTab } from './_app/components/imageBackgroundTabs'

// run all init scripts
const loadHandler = () => {

  pageSetup()
  setupGsap()

  document.body.classList.add('loaded')

}
document.addEventListener('DOMContentLoaded', loadHandler)

window.onload = function () {
  ScrollTrigger.refresh(true)
}

// run all scripts on resize.
const resizeHandler = () => waitForFinalEvent(() => {

  menuHeight()
  ScrollTrigger.refresh(true)

}, 500, 'dont resize again')
window.addEventListener('resize', resizeHandler)

// event bubbling click handler
const clickHandler = (event) => {

  //toggle popovers
  if(matches('[data-popover-target]')){
    togglePopover(event.target)
  }

  //accordion
  if(matches('.accordion__heading')){
    let row = event.target.parentNode
    row.classList.toggle('open')
    setTimeout(function() {ScrollTrigger.refresh(true)}, 500)
  }
  
  //main-menu open/close
  if(matches('[data-toggle-main-menu]')){
    document.querySelector('.main-menu').classList.toggle('open');
  }

  //image background tabs
  if(matches('[data-toggle-bg-t-content]')){
    toggleImageBackgroundTab(event.target)
  }

}
document.addEventListener('click', clickHandler, false)
