import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);


function calculateAspectRatioFit(srcWidth, srcHeight, maxWidth, maxHeight) {

    var ratio = Math.max(maxWidth / srcWidth, maxHeight / srcHeight);

    return { width: Math.round(srcWidth*ratio), height: Math.round(srcHeight*ratio) };
 }

const restartVideo = (video) => {
    video.currentTime = 0;
}

export const setupVideoMask = (section) => {

        const mask = section.querySelector('.block-video_mask__mask__text')
        const maskParent = mask.parentNode
        let messaging = section.querySelectorAll('.block-video_mask__messaging h3')
        
    
        let tl = gsap.timeline({
            scrollTrigger: {
                // refreshPriority: 2,
                // markers:true,
                trigger: section,   
                pin: section,   // pin the trigger element while active
                start: `top top`, // when the top of the trigger hits the top of the viewport
                end:  `+=${window.innerHeight * 3}px`, // end after scrolling 500px beyond the start
                scrub: 0.6, // smooth scrubbing, takes 1 second to "catch up" to the scrollbar
                snap: {
                    snapTo: "labels", // snap to the closest label in the timeline
                    duration: {min: 0.2, max: 1}, // the snap animation should be at least 0.2 seconds, but no more than 3 seconds (determined by velocity)
                    delay: 0.2, // wait 0.2 seconds from the last scroll event before doing the snapping
                    ease: "power1.inOut" // the ease of the snap animation ("power3" by default)
                },
                onRefresh: ({progress, direction, isActive}) => {
                    let size = calculateAspectRatioFit(1920, 1080, window.innerWidth, window.innerHeight)
                    mask.style.backgroundSize = `${size.width}px ${size.height}px`
                }
            }
          });
          
        
        tl.addLabel("start")
        tl.to(mask, { fontSize: '1200px', duration: 1.5 })
        tl.to(maskParent, { autoAlpha: 0, duration: 0.5 }, "-=0.5")
        tl.call(restartVideo, [section.querySelector('video')], "-=0.5")
        tl.addLabel("view text")

          
        tl.fromTo(messaging[0], { y: '30vh'}, { y: '-50vh', duration: 2 }, "-=0.5")
        tl.to(messaging[0], { autoAlpha: 0, duration: 0.5 }, "-=0.5")
        tl.addLabel("second text")
        tl.to(messaging[1], { autoAlpha: 1, duration: 0.5 }, "-=0.5")
        tl.addLabel("end")


}