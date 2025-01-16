import axios from 'axios';
const api = axios.create({
    baseURL: "http://127.0.0.1:8000"
    // baseURL: "http://localhost:8000"
    // baseURL: "https://gism.ac.th"
});

const changeLanguage = (language) => {

    api.post('/change-language', {
        language: language
    }).then(() => {
        window.location.reload();
    })
}

const navContainer = document.getElementById("nav-container")

window.addEventListener("scroll", function () {
    if (this.window.scrollY == 0) {
        navContainer.classList.remove("bg-warm_yellow", "bg-opacity-75");
    } else {
        if (!navContainer.classList.contains("bg-warm_yellow")) navContainer.classList.add("bg-warm_yellow", "bg-opacity-75");
    }
})

let baseUrl = window.location.origin;
let dropDownState = false;

const languageElements = {
    select: document.getElementById('language-select'),
    text: document.getElementById('language-text'),
    image: document.getElementById('language-image'),
    container: document.getElementById('language-select-container'),
    select2: document.getElementById('language-select-2'),
    image2: document.getElementById('language-image-2'),
    container2: document.getElementById('language-select-container-2'),
    navList: document.getElementById('nav-list')
};

const allLanguages = {
    en: { image: `${baseUrl}/assets/Icon/GBR.png`, text: "English" },
    th: { image: `${baseUrl}/assets/Icon/THA.png`, text: "Thailand" },
    zh: { image: `${baseUrl}/assets/Icon/CHN.png`, text: "中文" }
};

const createLanguageOption = (language, isLast) => {
    const div = document.createElement('div');
    div.classList.add('bg-warm_gray', 'gap-2', 'flex', 'py-2', 'px-3', 'hover:bg-dim_gray', 'hover:text-white', 'cursor-pointer');

    const img = document.createElement('img');
    img.src = allLanguages[language].image;
    img.classList.add('w-6');
    div.appendChild(img);

    const text = document.createElement('p');
    text.classList.add('font-avenir-light');
    text.textContent = allLanguages[language].text;
    div.appendChild(text);

    div.addEventListener('click', () => {
        changeLanguage(language);
    });

    if (isLast) {
        div.classList.add('rounded-bl-lg', 'rounded-br-lg');
    }

    return div;
};

const toggleDropdown = () => {
    const { select, container } = languageElements;
    const currentLanguage = select.getAttribute('value');
    const languages = Object.keys(allLanguages).filter(lang => lang !== currentLanguage);

    if (dropDownState) {
        select.classList.add('rounded-bl-lg', 'rounded-br-lg', 'bg-warm_gray', 'hover-parent');
        select.classList.remove('bg-charcoal_gray', 'text-white', 'svg-white', 'border-b-[1px]', 'border-warm_gray');
        container.innerHTML = '';
    } else {
        select.classList.remove('rounded-bl-lg', 'rounded-br-lg', 'bg-warm_gray', 'hover-parent');
        select.classList.add('bg-charcoal_gray', 'text-white', 'svg-white', 'border-b-[1px]', 'border-warm_gray');
        container.innerHTML = '';

        languages.forEach((language, index) => {
            const isLast = index === languages.length - 1;
            container.appendChild(createLanguageOption(language, isLast));
        });
    }

    dropDownState = !dropDownState;
};

languageElements.select.addEventListener('click', toggleDropdown);

languageElements.select2.addEventListener('change', (e) => {
    languageElements.image2.src = allLanguages[e.target.value].image;
    changeLanguage(e.target.value);
})

const closeDropdownIfClickedOutside = (event) => {
    const { select, container } = languageElements;
    if (!select.contains(event.target) && !container.contains(event.target)) {
        if (dropDownState) {
            toggleDropdown();
        }
    }
};

document.addEventListener('click', closeDropdownIfClickedOutside);

const hamburgerBar = document.getElementById("hamburger-bar");

hamburgerBar.addEventListener('click', () => {
    const { container2, navList } = languageElements;

    navList.classList.remove('hidden');
    container2.classList.remove('hidden');

    if (hamburgerBar.classList.contains('hamburger-bar')) {
        hamburgerBar.classList.remove('hamburger-bar');
        document.body.classList.remove('overflow-hidden');

        container2.classList.remove('animate-navAppear');
        container2.classList.add('animate-navDisappear');
        navList.classList.remove('animate-navAppear');
        navList.classList.add('animate-navDisappear');
    } else {
        hamburgerBar.classList.add('hamburger-bar');
        document.body.classList.add('overflow-hidden');

        container2.classList.remove('animate-navDisappear');
        container2.classList.add('animate-navAppear');
        navList.classList.remove('animate-navDisappear');
        navList.classList.add('animate-navAppear');
    }
})

const acceptPolicyEnquire = document.getElementById('accept-policy-enquire-container')
const acceptPolicyEnquireCheckbox = document.getElementById('accept-policy-enquire-checkbox');
const acceptPolicyEnquireTick = document.getElementById('accept-policy-enquire-tick');
const acceptPolicyEnquireLabel = document.getElementById('accept-policy-enquire-label');

const acceptPolicyToggleCheckBox = () => {
    if (acceptPolicyEnquireCheckbox.checked) {
        acceptPolicyEnquire.classList.remove('bg-white', 'border-black');
        acceptPolicyEnquire.classList.add('bg-red-500', 'bg-opacity-25', 'border-red-500');
        acceptPolicyEnquireTick.classList.add('hidden');
    } else {
        acceptPolicyEnquire.classList.remove('bg-red-500', 'bg-opacity-25', 'border-red-500');
        acceptPolicyEnquire.classList.add('bg-white', 'border-black');
        acceptPolicyEnquireTick.classList.remove('hidden');
    }
    acceptPolicyEnquireCheckbox.checked = !acceptPolicyEnquireCheckbox.checked;
}

if (acceptPolicyEnquire) acceptPolicyEnquire.addEventListener('click', acceptPolicyToggleCheckBox);

if (acceptPolicyEnquireLabel) acceptPolicyEnquireLabel.addEventListener('click', acceptPolicyToggleCheckBox);

const requiredInputElements = document.querySelectorAll('.required');

requiredInputElements.forEach(requiredInputElement => {
    requiredInputElement.addEventListener('focusout', (e) => {
        let validate = requiredInputElement.getAttribute('validate') ?? 'text';
        let validated = true;

        if (!e.target.value) {
            requiredInputElement.classList.remove('border-black');
            requiredInputElement.classList.add('border-red-500', 'bg-red-500', 'bg-opacity-25', 'border');
            validated = false;
        }

        if (validate === 'email') {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(e.target.value)) {
                requiredInputElement.classList.remove('border-black');
                requiredInputElement.classList.add('border-red-500', 'bg-red-500', 'bg-opacity-25', 'border');
                validated = false;
            }
        }

        if (validated) {
            requiredInputElement.classList.remove('border-red-500', 'bg-red-500', 'bg-opacity-25', 'border');
            requiredInputElement.classList.add('border-black');
        }
    })
})

const elements = document.querySelectorAll('.animated-element');

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
            entry.target.classList.remove('move');
        } else {
            const threshold = entry.target.clientHeight * 0.1;
            if (entry.boundingClientRect.top > threshold) {
                entry.target.classList.remove('show');
                entry.target.classList.add('move');
            }
        }
    });
}, {
    threshold: 0.001
});

elements.forEach(element => {
    element.classList.add('move');
    observer.observe(element);
});

const heartContainers = document.querySelectorAll('.heart-container');

const toggleHeart = (e) => {
    const clickedIcon = e.target.classList.contains('heart-empty') ? 'heart-empty' : 'heart-fill';
    const targetElement = getTargetElement(e.target, clickedIcon);

    targetElement.forEach(child => {
        if (child.nodeType === 1) {
            toggleClass(child, clickedIcon);
        }
    });
};

const getTargetElement = (clickedElement, clickedIcon) => {
    if (clickedIcon === 'heart-empty') {
        return clickedElement.parentElement.childNodes;
    } else {
        return clickedElement.closest('.heart-container').childNodes;
    }
};

const toggleClass = (element, clickedIcon) => {
    if (element.classList.contains(clickedIcon)) {
        element.classList.remove('show');
    } else {
        element.classList.add('show');
    }
};

heartContainers.forEach(heartContainer => {
    heartContainer.querySelectorAll('.heart-empty, .heart-fill').forEach(heartElement => {
        heartElement.addEventListener('click', toggleHeart);
    });
});




