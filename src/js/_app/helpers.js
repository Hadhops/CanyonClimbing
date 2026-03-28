export var waitForFinalEvent = (function () {
  var timers = {}
  return function (callback, ms, uniqueId) {
	  if (!uniqueId) {
      uniqueId = "Don't call this twice without a uniqueId"
	  }
	  if (timers[uniqueId]) {
      clearTimeout(timers[uniqueId])
	  }
	  timers[uniqueId] = setTimeout(callback, ms)
  }
})()

export const matches = (target) => {
  return event.target.matches ? event.target.matches(target) : event.target.msMatchesSelector(target)
}


export const getNextSibling = function (elem, selector) {

	// Get the next sibling element
	var sibling = elem.nextElementSibling;

	// If there's no selector, return the first sibling
	if (!selector) return sibling;

	// If the sibling matches our selector, use it
	// If not, jump to the next sibling and continue the loop
	while (sibling) {
		if (sibling.matches(selector)) return sibling;
		sibling = sibling.nextElementSibling
	}

};

export const getPreviousSibling = function (elem, selector) {

	// Get the next sibling element
	var sibling = elem.previousElementSibling;

	// If there's no selector, return the first sibling
	if (!selector) return sibling;

	// If the sibling matches our selector, use it
	// If not, jump to the next sibling and continue the loop
	while (sibling) {
		if (sibling.matches(selector)) return sibling;
		sibling = sibling.previousElementSibling;
	}

};

export const randomNumber = function (min, max) {
	return Math.floor(Math.random() * (max - min + 1) + min);
};