export default class Tabs {
  tabNav: HTMLElement;
  tabContent: HTMLDivElement;
  tabNavItems: NodeListOf<HTMLAnchorElement>;

  constructor(tabNav: HTMLElement, tabContent: HTMLDivElement) {
    this.tabNav = tabNav;
    this.tabContent = tabContent;

    this.tabNavItems = this.tabNav.querySelectorAll(".tab-nav__item");

    this.addEventForTabNavItems();
  }
  addEventForTabNavItems () {
    this.tabNavItems.forEach((navItem) => {
      navItem.addEventListener("click", this.handleChangeTabEvent);
    });
  }

  handleChangeTabEvent = (event: MouseEvent) => {
    event.preventDefault();
    const _self: HTMLAnchorElement = event.currentTarget as HTMLAnchorElement;

    if (_self.classList.contains("tab-nav__item--active")) return;

    this.removeActiveClass();
    this.addActiveClass(_self);
  }

  addActiveClass (navItem: HTMLAnchorElement) {
    navItem.classList.add("tab-nav__item--active");
    const target = navItem.dataset.target;
    const tabPane = this.tabContent.querySelector(target) as HTMLDivElement;
    tabPane.classList.add("tab-pane--active");
  }

  removeActiveClass () {
    this.tabNav.querySelector(".tab-nav__item--active").classList.remove("tab-nav__item--active");
    this.tabContent.querySelector(".tab-pane--active").classList.remove("tab-pane--active");
  }
}