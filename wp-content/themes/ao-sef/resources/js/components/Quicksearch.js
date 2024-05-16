import Axios from "axios";

export default class Quicksearch {

    constructor() {
        this.root = document.querySelector('.quicksearch');
        this.form = this.root.querySelector('.quicksearch__form');
        this.input = this.root.querySelector('.quicksearch__input');
        this.dropdown = this.createDropdown();
        this.results = this.createResults();

        this.url = this.form.getAttribute('action');
        this.isOpen = false;
        this.isLoading = false;

        this.initEvents();
        this.hideDropdown();
    }

    initEvents() {
        this.form.addEventListener('submit', (e) => this.submit(e));
        this.input.addEventListener('keyup', (e) => this.submit(e));
    }

    submit(event) {
        event.preventDefault();

        let value = this.input.value;

        if(! value.length) {
            return this.hideDropdown();
        }

        this.setLoading();

        Axios.get(this.url + '?' + this.input.getAttribute('name') + '=' + value)
            .then((response) => {
                this.unsetLoading();
                this.showResult(response.data);
            });
    }

    showResult(html) {
        let root = document.createElement('DIV');
        root.innerHTML = html;

        this.results.innerHTML = '';

        let results = root.querySelectorAll('.result');

        if(! results.length) {
            return this.hideDropdown();
        }

        for (var i = 0; i < results.length; i++) {
            this.results.appendChild(results[i]);
        }

        this.showDropdown();
    }

    showDropdown() {
        if (this.isOpen) return;

        this.dropdown.classList.add('quicksearch__dropdown--show');
        this.isOpen = true;
    }

    hideDropdown() {
        if (! this.isOpen) return;

        this.dropdown.classList.remove('quicksearch__dropdown--show');
        this.isOpen = false;
    }

    setLoading() {
        if (this.isLoading) return;

        this.dropdown.classList.add('quicksearch__dropdown--loading');
        this.isLoading = true;
    }

    unsetLoading() {
        if (! this.isLoading) return;

        this.dropdown.classList.remove('quicksearch__dropdown--loading');
        this.isLoading = false;
    }

    createDropdown() {
        let dropdown = document.createElement('DIV');

        dropdown.classList.add('quicksearch__dropdown');

        this.form.appendChild(dropdown);

        return dropdown;
    }

    createResults() {
        let results = document.createElement('DIV');

        results.classList.add('quicksearch__results');

        this.dropdown.appendChild(results);

        return results;
    }

}