import './_app/polyfils'
import { ScrollTrigger } from "gsap/ScrollTrigger"
import { waitForFinalEvent, matches } from './_app/helpers.js'
import { togglePopover } from './_app/popover'
import { setupGsap } from './_app/gsap'
import { pageSetup, menuHeight } from './_app/page-setup'
import { toggleImageBackgroundTab } from './_app/components/imageBackgroundTabs'
import { setMainMenuOpen, isMainMenuOpen, setupMainMenuKeys } from './_app/main-menu'

// run all init scripts
const loadHandler = () => {

  pageSetup()
  setupGsap()
  setupMainMenuKeys()

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
  if(matches('.accordion__toggle')){
    const toggle = event.target
    const isOpen = toggle.closest('.accordion__row').classList.toggle('open')
    toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false')
    setTimeout(function() {ScrollTrigger.refresh(true)}, 500)
  }
  
  //main-menu open/close
  if(matches('[data-toggle-main-menu]')){
    setMainMenuOpen(!isMainMenuOpen())
  }

  //image background tabs
  if(matches('[data-toggle-bg-t-content]')){
    toggleImageBackgroundTab(event.target)
  }

}
document.addEventListener('click', clickHandler, false)

// close menu when navigating back via browser
window.addEventListener('pageshow', () => {
  setMainMenuOpen(false)
})