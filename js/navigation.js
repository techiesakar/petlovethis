/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
  const siteNavigation = document.getElementById("site-navigation");

  // Return early if the navigation doesn't exist.
  if (!siteNavigation) {
    return;
  }

  const button = siteNavigation.getElementsByTagName("button")[0];

  // Return early if the button doesn't exist.
  if ("undefined" === typeof button) {
    return;
  }

  const menu = siteNavigation.getElementsByTagName("ul")[0];

  // Hide menu toggle button if menu is empty and return early.
  if ("undefined" === typeof menu) {
    button.style.display = "none";
    return;
  }

  if (!menu.classList.contains("nav-menu")) {
    menu.classList.add("nav-menu");
  }

  // Toggle the .toggled class and the aria-expanded value each time the button is clicked.
  button.addEventListener("click", function () {
    siteNavigation.classList.toggle("toggled");

    if (button.getAttribute("aria-expanded") === "true") {
      button.setAttribute("aria-expanded", "false");
    } else {
      button.setAttribute("aria-expanded", "true");
    }
  });

  // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
  document.addEventListener("click", function (event) {
    const isClickInside = siteNavigation.contains(event.target);

    if (!isClickInside) {
      siteNavigation.classList.remove("toggled");
      button.setAttribute("aria-expanded", "false");
    }
  });

  // Get all the link elements within the menu.
  const links = menu.getElementsByTagName("a");

  // Get all the link elements with children within the menu.
  const linksWithChildren = menu.querySelectorAll(
    ".menu-item-has-children > a, .page_item_has_children > a"
  );

  // Toggle focus each time a menu link is focused or blurred.
  for (const link of links) {
    link.addEventListener("focus", toggleFocus, true);
    link.addEventListener("blur", toggleFocus, true);
  }

  // Toggle focus each time a menu link with children receive a touch event.
  for (const link of linksWithChildren) {
    link.addEventListener("touchstart", toggleFocus, false);
  }

  /**
   * Sets or removes .focus class on an element.
   */
  function toggleFocus() {
    if (event.type === "focus" || event.type === "blur") {
      let self = this;
      // Move up through the ancestors of the current link until we hit .nav-menu.
      while (!self.classList.contains("nav-menu")) {
        // On li elements toggle the class .focus.
        if ("li" === self.tagName.toLowerCase()) {
          self.classList.toggle("focus");
        }
        self = self.parentNode;
      }
    }

    if (event.type === "touchstart") {
      const menuItem = this.parentNode;
      event.preventDefault();
      for (const link of menuItem.parentNode.children) {
        if (menuItem !== link) {
          link.classList.remove("focus");
        }
      }
      menuItem.classList.toggle("focus");
    }
  }
})();

// var prevScrollpos = window.pageYOffset;

window.addEventListener("scroll", function () {
  // scrollFunction();
});

// function scrollFunction() {
//   var currentScrollPos = window.pageYOffset;
//   if (prevScrollpos > currentScrollPos) {
//     document.body.classList.remove("scrolled_down");
//     document.body.classList.add("scrolled_up");
//   } else {
//     document.body.classList.remove("scrolled_up");
//     document.body.classList.add("scrolled_down");
//   }
//   prevScrollpos = currentScrollPos;

//   if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
//     document.getElementById("primary_nav").classList.add("is_fixed");
//     document.getElementById("masthead").classList.remove("scrolled_completed");
//     document.body.classList.add("scrolled");
//   } else {
//     document.getElementById("primary_nav").classList.remove("is_fixed");
//     document.getElementById("masthead").classList.add("scrolled_completed");
//     document.body.classList.remove("scrolled");
//   }
// }

const searchCloses = document.querySelectorAll(".search_close");
const searchOverlayContainer = document.getElementById("search_overlay");
console.log(searchCloses);
searchCloses.forEach((searchClose) => {
  searchClose.addEventListener("click", () => {
    searchOverlayContainer.classList.toggle("active");
  });
});

// Check if #rank-math-toc exists in the document
var tocElement = document.querySelector("#rank-math-toc");
if (tocElement) {
  // Select the ul element within #rank-math-toc
  var navElement = tocElement.querySelector("nav");
  if (navElement) {
    // Select the h2 element within #rank-math-toc
    var h2Element = tocElement.querySelector("h2");
    if (h2Element) {
      // Add onclick event listener to the h2 element
      h2Element.addEventListener("click", function () {
        // Toggle a CSS class to change the height of the ul element
        navElement.classList.toggle("collapsed");
      });
    }
  }
}

// For Scroll To Top

// Get the button element
const toTopButton = document.getElementById("toTop");

// Add a scroll event listener to the window
window.addEventListener("scroll", () => {
  // Check the scroll position
  if (window.scrollY >= 200) {
    // Display the button
    toTopButton.classList.remove("hidden");
  } else {
    // Hide the button
    toTopButton.classList.add("hidden");
  }
});

// Add a click event listener to the button
toTopButton.addEventListener("click", () => {
  // Scroll smoothly to the top of the page
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

// Scroll Indicator

var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  var scrollIndicatorElement = document.getElementById("scrollIndicator");

  if (scrollIndicatorElement) {
    scrollIndicator();
  }
}

function scrollIndicator() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height =
    document.documentElement.scrollHeight -
    document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;

  document.getElementById("scrollIndicator").style.width = scrolled + "%";
}
