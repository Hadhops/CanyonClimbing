import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const setNewColour = (colour) => {
    
    gsap.to("html", {"--body-background": colour, duration: 0.8, overwrite: 'auto'});
    
    if(colour == '#E3B545'){
        gsap.to("html", {"--img-bg": '#F7E6BB', duration: 0.8, overwrite: 'auto'});
    } else {
        gsap.to("html", {"--img-bg": '#E3B545', duration: 0.8, overwrite: 'auto'});
    }
}

export const setupToggleBackground = (section) => {

    ScrollTrigger.create({
        trigger: section,
        start: "top center",
        end: "top center",
        onEnter: ({progress, direction, isActive}) => {
            let colour = section.getAttribute('data-new-colour')
            setNewColour(colour)
        },
        onEnterBack: ({progress, direction, isActive}) => {
            let colour = section.getAttribute('data-prev-colour')
            setNewColour(colour)
        }
    });
}