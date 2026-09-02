const MENU_SELECTOR = '.main-menu'
const TOGGLE_SELECTOR = '[data-toggle-main-menu]'

// things that can take focus, minus anything explicitly removed from the tab order
const FOCUSABLE_SELECTOR = [
  'a[href]',
  'button:not([disabled])',
  'input:not([disabled])',
  'select:not([disabled])',
  'textarea:not([disabled])',
  '[tabindex]:not([tabindex="-1"])'
].join(', ')

// what had focus before the menu opened, so it can be handed back on close
let previouslyFocused = null

const getMenu = () => document.querySelector(MENU_SELECTOR)

export const isMainMenuOpen = () => {
  const menu = getMenu()
  return !!menu && menu.classList.contains('open')
}

// only elements actually laid out - skips anything inside a hidden branch
const getFocusable = (menu) =>
  Array.prototype.slice.call(menu.querySelectorAll(FOCUSABLE_SELECTOR))
    .filter(el => el.offsetWidth > 0 || el.offsetHeight > 0)

export const setMainMenuOpen = (isOpen) => {

  const menu = getMenu()
  if(!menu) return

  const wasOpen = menu.classList.contains('open')

  menu.classList.toggle('open', isOpen)

  // force a synchronous style/layout flush, so the visibility change from
  // .open has landed before anything below tries to move focus into the menu
  void menu.offsetHeight

  document.querySelectorAll(TOGGLE_SELECTOR).forEach(button => {
    button.setAttribute('aria-expanded', isOpen ? 'true' : 'false')
  })

  if(isOpen && !wasOpen){

    previouslyFocused = document.activeElement

    const target = menu.querySelector('.main-menu__close') || getFocusable(menu)[0]

    if(target){
      target.focus()
      // if the menu was still mid-transition the browser may refuse focus - retry once
      if(document.activeElement !== target){
        window.requestAnimationFrame(() => target.focus())
      }
    }

  } else if(!isOpen && wasOpen){

    if(previouslyFocused && typeof previouslyFocused.focus === 'function'){
      previouslyFocused.focus()
    }
    previouslyFocused = null

  }

}

// Escape closes the menu; Tab and Shift+Tab cycle within it while it is open
export const setupMainMenuKeys = () => {

  document.addEventListener('keydown', (event) => {

    if(!isMainMenuOpen()) return

    if(event.key === 'Escape' || event.key === 'Esc'){
      setMainMenuOpen(false)
      return
    }

    if(event.key !== 'Tab') return

    const menu = getMenu()
    const focusable = getFocusable(menu)

    if(focusable.length === 0){
      event.preventDefault()
      return
    }

    const first = focusable[0]
    const last = focusable[focusable.length - 1]

    // focus escaped the menu (or never entered it) - pull it back in
    if(!menu.contains(document.activeElement)){
      event.preventDefault()
      ;(event.shiftKey ? last : first).focus()
      return
    }

    if(event.shiftKey && document.activeElement === first){
      event.preventDefault()
      last.focus()
    } else if(!event.shiftKey && document.activeElement === last){
      event.preventDefault()
      first.focus()
    }

  })

}
