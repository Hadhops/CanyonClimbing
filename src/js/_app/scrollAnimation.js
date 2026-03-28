import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { randomNumber } from "./helpers";

import { setupToggleBackground } from "./toggle-background";
import { setupVideoMask } from "./video-mask";

gsap.registerPlugin(ScrollTrigger);

export const setupScrollAnimation = () => {
	const blocks = document.querySelectorAll(
		".page-content section[class^=block-], .page-content .block-bg-colour"
	);

	blocks.forEach((block) => {
		if (block.classList.contains("block-video_mask")) {
			setupVideoMask(block);
		} else if (block.classList.contains("block-bg-colour")) {
			setupToggleBackground(block);
		} else if (block.classList.contains("block-icon_grid")) {
			gsap.from(block.querySelectorAll(".block-icon_grid__tile"), {
				scrollTrigger: {
					trigger: block,
					start: "top 80%",
				},
				stagger: 0.15,
				y: 80,
				autoAlpha: 0,
				duration: 0.5,
			});
		} else if (block.classList.contains("block-list_of_links")) {
			let tiles = block.querySelectorAll(".link-tile");

			if (tiles.length >= 5 && tiles.length <= 7) {

				tiles.forEach(tile => {

					let start = randomNumber(30, 150)
					let end = randomNumber(30, 150) * -1

					gsap.fromTo(tile, {
							y: start,
						},
						{ y: end,
						scrollTrigger: {
							trigger: block,
							start: "top bottom",
							end: "bottom top",
							scrub: 0.5,
							}
						}
					);
				});


			} else {
				gsap.from(tiles, {
					scrollTrigger: {
						trigger: block,
						start: "top 80%",
						end: "top 10%",
						scrub: 0.5,
					},
					stagger: {
						from: "random",
						each: 0.15,
					},
					scale: 0.95,
					autoAlpha: 0,
					// duration: 0.5,
				});
			}
		} else if (block.classList.contains("block-post_list")) {
			gsap.from(block.querySelectorAll(".news-tile"), {
				scrollTrigger: {
					trigger: block,
					start: "top bottom",
					end: "bottom bottom",
					scrub: 0.5,
				},
				stagger: {
					each: 0.2,
				},
				x: 50,
				autoAlpha: 0,
			});
		} else if (block.classList.contains("block-img-bg") && !block.classList.contains("block-img-bg-t")) {
			gsap.fromTo(
				block.querySelector(".block-img-bg__content"),
				{
					y: "15vh",
				},
				{
					y: "-15vh",
					scrollTrigger: {
						trigger: block,
						start: "top bottom",
						end: "bottom top",
						scrub: 0.5,
					},
				}
			);

			let animateChildren = block.querySelectorAll(".block-img-bg__content>*")

			if(animateChildren.length > 0) {
				gsap.from(animateChildren, {
					scrollTrigger: {
						trigger: block,
						start: "top 40%",
					},
					stagger: {
						each: 0.1,
						ease: "none",
					},
					x: -40,
					autoAlpha: 0,
					ease: "none",
					duration: 0.4,
				});
			}
		} else if (block.classList.contains("block-two_col")) {
			gsap.from(block, {
				scrollTrigger: {
					trigger: block.querySelector(".image-bg img"),
					start: "top 90%",
					end: "bottom 70%",
					scrub: 0.3,
				},
				"--img-bg-distance": 0,
				overwrite: "auto",
			});
		} else {
			console.log(block);
		}

		if(!block.classList.contains('block-video_mask')){
			gsap.from(block, {
				scrollTrigger: {
					trigger: block,
					start: "top bottom",
					end: "top 70%",
					scrub: 0.6
				},
				autoAlpha: 0,
				y: 80
			})
		}

	});
};
