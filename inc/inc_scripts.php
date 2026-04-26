<?php

function startScript()
{
    echo '<script>';
}

function closeScript()
{
    echo '</script>';
}

/* The JavaScript below is not used anymore, but I want to 
keep it for reference in case I want to add more complex animations 
to the hamburger menu in the future. 
The current CSS is using a checkbox to control the menu visibility */
function makeHeaderHamburgerMenuScript(){
    echo '
        document.addEventListener("DOMContentLoaded", () => {
            const hamburger = document.getElementById("hamburger");
            const mobileMenu = document.getElementById("mobileMenu");
            const hamIcon = document.querySelector(".ham-icon");
            const closeIcon = document.querySelector(".close-icon");

            let menuOpen = false;

            hamburger.addEventListener("click", () => {
                menuOpen = !menuOpen;

                if (menuOpen) {
                    mobileMenu.style.right = "0";
                    hamIcon.style.opacity = "0";
                    closeIcon.style.opacity = "1";
                } else {
                    mobileMenu.style.right = "-350px";
                    hamIcon.style.opacity = "1";
                    closeIcon.style.opacity = "0";
                }
            });
        });
    ';
}

?>