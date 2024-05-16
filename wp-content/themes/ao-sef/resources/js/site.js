import Quicksearch from "./components/Quicksearch";

class Site {

    constructor() {
        this.quicksearch = new Quicksearch();
    }

};

window.addEventListener('load', () => window.site = new Site());