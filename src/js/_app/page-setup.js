import { getNextSibling, getPreviousSibling } from "./helpers";
import { setupImageBackgroundTabs } from './components/imageBackgroundTabs';
import {setupPopoverFooters} from './popover'
let prevScrollpos
let navbar = document.querySelector('.header-nav')

export const pageSetup = () => {

    // //collapse margins for basic content block
    // document.querySelectorAll('.block-basic--top').forEach(section => {
    //     let previous = getPreviousSibling(section, 'section');
    //     if(!previous) return

    //     previous.classList.add('mb-0')
    // })

    // document.querySelectorAll('.block-basic--bottom').forEach(section => {
    //     let next = getNextSibling(section, 'section');
    //     if(!next) return

    //     next.classList.add('mt-0')
    // })

    //add previous colour options to background colour transition block
    document.querySelectorAll('.block-bg-colour').forEach(section => {
        let previous = getPreviousSibling(section, '.block-bg-colour');
        let previousColour = previous ? previous.getAttribute('data-new-colour') : '#FFFFFF';

        section.setAttribute('data-prev-colour', previousColour)

    })

    menuHeight()

    //sticky nav
    prevScrollpos = 0
    window.requestAnimationFrame(navStep)


    //setup image background tab blocks
    setupImageBackgroundTabs()

    //wide popover footer menus
    setupPopoverFooters()

}

export const menuHeight = () => {
    let height = document.querySelector('.header-nav').offsetHeight
    document.documentElement.style.setProperty('--nav-menu-height', height + 'px')
}


const navStep = () => {

  let currentScrollPos = window.pageYOffset

  if (currentScrollPos != prevScrollpos) {

    // let height = navbar.getBoundingClientRect().height
    
    // if (currentScrollPos > height && currentScrollPos > 30) {
    //   navbar.classList.add('small')
    // } else {
    //   navbar.classList.remove('small')
    // }

    if (prevScrollpos < currentScrollPos && currentScrollPos > 30) {
      navbar.classList.add('hidden')
    } else {
      navbar.classList.remove('hidden')
    }

    prevScrollpos = currentScrollPos

  }

  window.requestAnimationFrame(navStep)
}