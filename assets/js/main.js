// header change color

$(document).ready(function() {
    var count_particles, stats, update;
    stats = new Stats();
    stats.setMode(0);
    stats.domElement.style.position = "absolute";
    stats.domElement.style.left = "0px";
    stats.domElement.style.top = "0px";
    document.body.appendChild(stats.domElement);
    count_particles = document.querySelector(".js-count-particles");
    update = function() {
        stats.begin();
        stats.end();
        if (
            window.pJSDom[0].pJS.particles &&
            window.pJSDom[0].pJS.particles.array
        ) {
            count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
        }
        requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
});
// todo
$(document).ready(function() {
    function menuTop() {
        if (window.location === window.location.hostname) {
            if ($(this).scrollTop() >= 200) {
                $(".header").addClass("active");
            } else {
                $(".header").removeClass("active");
            }
        } else {
            $(".header").addClass("active");
        }
    }
    menuTop();
    $(window).scroll(menuTop);
    $(".hamburger").on("click", function() {
        $(".hamburger").toggleClass("active");
        $(".menu-right").toggleClass("active");
    });
});
// loading screen
$(window).on("load", function() {
    $("#preloder").fadeOut(2000);
});
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("open-modal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
};
modal.onclick = function() {
    modal.style.display = "none";
};
document.addEventListener("keydown", function(event) {
    if (event.key === "Escape") {
        modal.style.display = "none";
    }
});
$(".product-img").click(function(event) {
    event.stopPropagation();
    // Do something
});