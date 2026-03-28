export const closeAllPopovers = () => {

    let pops = document.querySelectorAll('.popover')

    pops.forEach( popover => {
        popover.classList.remove('open')
    })

    document.body.classList.remove('no-scroll-mob')
}

const openPopover = (popover) => {

    closeAllPopovers()
    document.body.classList.add('no-scroll-mob')

    popover.classList.add('open')

}

// export const closePopover = (button) => {

//     let targetID = button.getAttribute('data-popover-target')

//     let target = document.querySelector(`[data-popover="${targetID}"`)
//     if(target.classList.contains('open')){
//         closeAllPopovers()
//     }
// }

export const togglePopover = (button) => {
    
    let targetID = button.getAttribute('data-popover-target')
    let target = document.querySelector(`[data-popover="${targetID}"`)

    if(!target) return

    if(!target.classList.contains('open')){
        openPopover(target)
    } else {
        closeAllPopovers()
    }
}

// export const showPopover = (button) => {
//     let target = document.querySelector(button.getAttribute('data-show-popover-id'))
//     openPopover(target)
// }


export const setupPopoverFooters = () => {

    let pops = document.querySelectorAll('.block-list_of_links__pops')

    pops.forEach(group => {

        let wides = group.querySelectorAll('.popover--wide')

        if(wides.length < 3) return;
            
        wides.forEach((wide, index) => {

            let prevIndex = index == 0 ? wides.length - 1 : index - 1
            let nextIndex = index == wides.length - 1 ? 0 : index + 1

            let footerConfig = {
                prevID: wides[prevIndex].getAttribute('data-popover'),
                nextID: wides[nextIndex].getAttribute('data-popover'),
                prevName: wides[prevIndex].querySelector('.content-style h2:first-of-type').innerHTML,
                nextName: wides[nextIndex].querySelector('.content-style h2:first-of-type').innerHTML
            }

            // console.log(prevIndex, nextIndex, wides.length)

            renderPopoverFooter(wide, footerConfig)

        })

    })

}

const renderPopoverFooter = (popover, items) => {

    let string = `<div class="popover__footer">
        <button data-popover-target="${items.prevID}" class="btn btn--basic">${items.prevName}</button>
        <button data-popover-target="${items.nextID}" class="btn btn--basic">${items.nextName}</button>
    </div>`

    console.log(string)

    popover.querySelector('.popover__inner').insertAdjacentHTML('beforeend', string);

}