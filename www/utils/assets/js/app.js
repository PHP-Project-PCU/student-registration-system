/* Template Name: Techwind - Tailwind CSS Multipurpose Landing & Admin Dashboard Template
   Author: Shreethemes
   Email: support@shreethemes.in
   Website: https://shreethemes.in
   Version: 2.2.0
   Created: May 2022
   File Description: Main JS file of the template
*/


/*********************************/
/*         INDEX                 */
/*================================
 *     01.  Loader               *
 *     02.  Toggle Menus         *
 *     03.  Menu Active          *
 *     04.  Clickable Menu       *
 *     05.  Menu Sticky          *
 *     06.  Back to top          *
 *     07.  Active Sidebar       *
 *     08.  Feather icon         *
 *     09.  Small Menu           *
 *     10.  Wow Animation JS     *
 *     11.  Contact us           *
 *     12.  Dark & Light Mode    *
 *     13.  LTR & RTL Mode       *
 ================================*/


window.addEventListener('load', fn, false)

//  window.onload = function loader() {
function fn() {
    // Preloader
    if (document.getElementById('preloader')) {
        setTimeout(() => {
            document.getElementById('preloader').style.visibility = 'hidden';
            document.getElementById('preloader').style.opacity = '0';
        }, 350);
    }
    // Menus
    activateMenu();
}

// document.oncontextmenu=()=>{
// return false;
// }

//Menu
/*********************/
/* Toggle Menu */
/*********************/
function toggleMenu() {
    document.getElementById('isToggle').classList.toggle('open');
    var isOpen = document.getElementById('navigation')
    if (isOpen.style.display === "block") {
        isOpen.style.display = "none";
    } else {
        isOpen.style.display = "block";
    }
};
/*********************/
/*    Menu Active    */
/*********************/
function getClosest(elem, selector) {

    // Element.matches() polyfill
    if (!Element.prototype.matches) {
        Element.prototype.matches =
            Element.prototype.matchesSelector ||
            Element.prototype.mozMatchesSelector ||
            Element.prototype.msMatchesSelector ||
            Element.prototype.oMatchesSelector ||
            Element.prototype.webkitMatchesSelector ||
            function (s) {
                var matches = (this.document || this.ownerDocument).querySelectorAll(s),
                    i = matches.length;
                while (--i >= 0 && matches.item(i) !== this) {}
                return i > -1;
            };
    }

    // Get the closest matching element
    for (; elem && elem !== document; elem = elem.parentNode) {
        if (elem.matches(selector)) return elem;
    }
    return null;

};

function activateMenu() {
    var menuItems = document.getElementsByClassName("sub-menu-item");
    if (menuItems) {

        var matchingMenuItem = null;
        for (var idx = 0; idx < menuItems.length; idx++) {
            if (menuItems[idx].href === window.location.href) {
                matchingMenuItem = menuItems[idx];
            }
        }

        if (matchingMenuItem) {
            matchingMenuItem.classList.add('active');
         
         
            var immediateParent = getClosest(matchingMenuItem, 'li');
      
            if (immediateParent) {
                immediateParent.classList.add('active');
            }
            
            var parent = getClosest(immediateParent, '.child-menu-item');
            if(parent){
                parent.classList.add('active');
            }

            var parent = getClosest(parent || immediateParent , '.parent-menu-item');
        
            if (parent) {
                parent.classList.add('active');

                var parentMenuitem = parent.querySelector('.menu-item');
                if (parentMenuitem) {
                    parentMenuitem.classList.add('active');
                }

                var parentOfParent = getClosest(parent, '.parent-parent-menu-item');
                if (parentOfParent) {
                    parentOfParent.classList.add('active');
                }
            } else {
                var parentOfParent = getClosest(matchingMenuItem, '.parent-parent-menu-item');
                if (parentOfParent) {
                    parentOfParent.classList.add('active');
                }
            }
        }
    }
}
/*********************/
/*  Clickable manu   */
/*********************/
if (document.getElementById("navigation")) {
    var elements = document.getElementById("navigation").getElementsByTagName("a");
    for (var i = 0, len = elements.length; i < len; i++) {
        elements[i].onclick = function (elem) {
            if (elem.target.getAttribute("href") === "javascript:void(0)") {
                var submenu = elem.target.nextElementSibling.nextElementSibling;
                submenu.classList.toggle('open');
            }
        }
    }
}
/*********************/
/*   Menu Sticky     */
/*********************/
// function windowScroll() {
//     const navbar = document.getElementById("topnav");
//     if (navbar != null) {
//         if (
//             document.body.scrollTop >= 50 ||
//             document.documentElement.scrollTop >= 50
//         ) {
//             navbar.classList.add("nav-sticky");
//         } else {
//             navbar.classList.remove("nav-sticky");
//         }
//     }
// }

window.addEventListener('scroll', (ev) => {
    ev.preventDefault();
    // windowScroll();
})
/*********************/
/*    Back To TOp    */
/*********************/

window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    var mybutton = document.getElementById("back-to-top");
    if(mybutton!=null){
        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
            mybutton.classList.add("block");
            mybutton.classList.remove("hidden");
        } else {
            mybutton.classList.add("hidden");
            mybutton.classList.remove("block");
        }
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

/*********************/
/*  Active Sidebar   */
/*********************/
(function () {
    var current = location.pathname.substring(location.pathname.lastIndexOf('/') + 1);;
    if (current === "") return;
    var menuItems = document.querySelectorAll('.sidebar-nav a');
    for (var i = 0, len = menuItems.length; i < len; i++) {
        if (menuItems[i].getAttribute("href").indexOf(current) !== -1) {
            menuItems[i].parentElement.className += " active";
        }
    }
})();

/*********************/
/*   Feather Icons   */
/*********************/
feather.replace();

/*********************/
/*     Small Menu    */
/*********************/
try {
    var spy = new Gumshoe('#navmenu-nav a');
} catch (err) {

}

/*********************/
/*      WoW Js       */
/*********************/
try {
    new WOW().init();
} catch (error) {
    
}

/*************************/
/*      Contact Js       */
/*************************/

try {
    function validateForm() {
        var name = document.forms["myForm"]["name"].value;
        var email = document.forms["myForm"]["email"].value;
        var subject = document.forms["myForm"]["subject"].value;
        var comments = document.forms["myForm"]["comments"].value;
        document.getElementById("error-msg").style.opacity = 0;
        document.getElementById('error-msg').innerHTML = "";
        if (name == "" || name == null) {
            document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Name*</div>";
            fadeIn();
            return false;
        }
        if (email == "" || email == null) {
            document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Email*</div>";
            fadeIn();
            return false;
        }
        if (subject == "" || subject == null) {
            document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Subject*</div>";
            fadeIn();
            return false;
        }
        if (comments == "" || comments == null) {
            document.getElementById('error-msg').innerHTML = "<div class='alert alert-warning error_message'>*Please enter a Comments*</div>";
            fadeIn();
            return false;
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("simple-msg").innerHTML = this.responseText;
                document.forms["myForm"]["name"].value = "";
                document.forms["myForm"]["email"].value = "";
                document.forms["myForm"]["subject"].value = "";
                document.forms["myForm"]["comments"].value = "";
            }
        };
        xhttp.open("POST", "php/contact.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("name=" + name + "&email=" + email + "&subject=" + subject + "&comments=" + comments);
        return false;
    }

    function fadeIn() {
        var fade = document.getElementById("error-msg");
        var opacity = 0;
        var intervalID = setInterval(function () {
            if (opacity < 1) {
                opacity = opacity + 0.5
                fade.style.opacity = opacity;
            } else {
                clearInterval(intervalID);
            }
        }, 200);
    }
} catch (error) {
    
}


/*********************/
/* Dark & Light Mode */
/*********************/
try {
    function changeTheme(e){
        e.preventDefault()
        const htmlTag = document.getElementsByTagName("html")[0]
        
        if (htmlTag.className.includes("dark")) {
            htmlTag.className = 'light'
        } else {
            htmlTag.className = 'dark'
        }
    }

    const switcher = document.getElementById("theme-mode")
    switcher?.addEventListener("click" ,changeTheme )
    
    const chk = document.getElementById('chk');

    chk.addEventListener('change',changeTheme);
} catch (err) {
    
}


/*********************/
/* LTR & RTL Mode */
/*********************/
try{
    const htmlTag = document.getElementsByTagName("html")[0]
    function changeLayout(e){
        e.preventDefault()
        const switcherRtl = document.getElementById("switchRtl")
        if(switcherRtl.innerText === "LTR"){
            htmlTag.dir = "ltr"
        }
        else{
            htmlTag.dir = "rtl"
        }
        
    }
    const switcherRtl = document.getElementById("switchRtl")
    switcherRtl?.addEventListener("click" ,changeLayout )
}
catch(err){}

try{
    function addNewRow(){
         // Get the table by its ID
    var table = document.getElementById("examTable");

    // Create a new row element
    var newRow = table.insertRow();

    // Create cells in the new row
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);

    // Add content to the new cells
    cell1.innerHTML = `
        <select class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
            <option>ပထမနှစ်စာမေးပွဲ</option>
            <option>ဒုတိယနှစ်စာမေးပွဲ</option>
            <option>တတိယနှစ်စာမေးပွဲ</option>
            <option>စတုတ္ထနှစ်စာမေးပွဲ</option>
        </select>`;
    cell2.innerHTML = `
        <select class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
            <option>CST</option>
            <option>CS</option>
            <option>CT</option>
        </select>`;
    cell3.innerHTML = `
        <input name="text" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="">`;
    cell4.innerHTML = `
        <input name="text" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="">`;
    cell5.innerHTML = `
        <select class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
            <option>အောင်</option>
            <option>ရှုံး</option>
        </select>`;
}
}catch(err){

}


/*********************/
/*       NRC         */
/*********************/

function setupNrcDropdowns(nrcCodeSelectId, nrcNameSelectId, jsonData) {
    const nrcCodeSelect = document.getElementById(nrcCodeSelectId);
    const nrcNameSelect = document.getElementById(nrcNameSelectId);

    const uniqueNrcCodes = [...new Set(jsonData.data.map(item => item.nrc_code))];

    uniqueNrcCodes.forEach(code => {
        let optionCode = document.createElement('option');
        optionCode.value = code;
        optionCode.textContent = code;
        nrcCodeSelect.appendChild(optionCode);
    });

    function updateNrcNameOptions(selectedCode) {
        nrcNameSelect.innerHTML = '';

        const filteredNames = jsonData.data.filter(item => item.nrc_code === selectedCode);

        filteredNames.forEach(item => {
            let optionName = document.createElement('option');
            optionName.value = item.name_mm;
            optionName.textContent = item.name_mm;
            nrcNameSelect.appendChild(optionName);
        });
    }

    nrcCodeSelect.addEventListener('change', (event) => {
        updateNrcNameOptions(event.target.value);
    });

    if (uniqueNrcCodes.length > 0) {
        nrcCodeSelect.value = uniqueNrcCodes[0];
        updateNrcNameOptions(uniqueNrcCodes[0]);
    }
}



/*********************/
/*       States      */
/*********************/
function setupRegionTownshipSelect(regionSelectId, townshipSelectId, jsonData) {
    const regionSelect = document.getElementById(regionSelectId);
    const townshipSelect = document.getElementById(townshipSelectId);

    // Populate the region dropdown
    jsonData.data.forEach(region => {
        let optionRegion = document.createElement('option');
        optionRegion.value = region.eng;
        optionRegion.textContent = region.mm;
        regionSelect.appendChild(optionRegion);
    });

    // Function to update township dropdown based on selected region
    function updateTownshipOptions(selectedRegion) {
        // Clear current options in the township dropdown
        townshipSelect.innerHTML = '';

        // Find the selected region's districts and townships
        const selectedRegionData = jsonData.data.find(region => region.eng === selectedRegion);

        if (selectedRegionData) {
            selectedRegionData.districts.forEach(district => {
                district.townships.forEach(township => {
                    let optionTownship = document.createElement('option');
                    optionTownship.value = township.eng;
                    optionTownship.textContent = township.mm;
                    townshipSelect.appendChild(optionTownship);
                });
            });
        }
    }

    // Event listener to update townships when a region is selected
    regionSelect.addEventListener('change', (event) => {
        updateTownshipOptions(event.target.value);
    });

    // Initialize townships dropdown with the first region's townships
    if (jsonData.data.length > 0) {
        regionSelect.value = jsonData.data[0].eng;
        updateTownshipOptions(jsonData.data[0].eng);
    }
}
