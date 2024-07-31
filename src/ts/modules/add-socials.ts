export default class AddSocials {
  addMoreBtn: HTMLAnchorElement;
  addSocialForm: HTMLFormElement;
  removeSocialBtns: NodeListOf<HTMLAnchorElement>;
  selectIconBtns: NodeListOf<HTMLAnchorElement>;
  removeIconBtns: NodeListOf<HTMLAnchorElement>;
  _wp: any;

  constructor(wp: any) {
    this.addMoreBtn = document.querySelector(".jins-social__add-more-social");
    this.addSocialForm = document.querySelector(".jins-social__form");
    this.removeSocialBtns = document.querySelectorAll(".jins-social__remove-social-btn");
    this.selectIconBtns = document.querySelectorAll(".jins-social__select-icon-btn");
    this.removeIconBtns = document.querySelectorAll(".jins-social__remove-icon-btn");
    this._wp = wp;

    this.addEventForAddMoreBtn();
    this.addEventForRemoveSocialBtns();
    this.addEventForSelectIconBtns();
    this.addEventForRemoveIconBtns();
  }

  handleSelectIconEvent = (event: MouseEvent) => {
    event.preventDefault();
    const _self: HTMLAnchorElement = event.currentTarget as HTMLAnchorElement;
    const imgInput = _self.previousElementSibling as HTMLInputElement;
    let imgPreview: HTMLImageElement | null = _self.nextElementSibling as HTMLImageElement;
    if (typeof this._wp !== "undefined") {
      const wpMedia = this._wp.media({
        title: "Select Icon",
        multiple: false,
      });
      wpMedia.on("select", () => {
        const attachment = wpMedia.state().get("selection").first().toJSON();
        this.changeInputValue(imgInput, attachment.id);
        if (imgPreview) imgPreview.src = attachment.url;
        else {
          imgPreview = document.createElement("img");
          imgPreview.classList.add("jins-social__social-icon-img");
          imgPreview.src = attachment.url;
          _self.insertAdjacentElement("afterend", imgPreview);

          // * Add remove icon button
          const removeIconBtn = document.createElement("a");
          removeIconBtn.classList.add("jins-social__remove-icon-btn");
          removeIconBtn.href = "javascript:void(0);";
          imgPreview.insertAdjacentElement("afterend", removeIconBtn);
          removeIconBtn.addEventListener("click", this.handleRemoveSocialIconEvent);
        }
      });
      wpMedia.open();
    }
  };

  handleRemoveSocialIconEvent = (event: MouseEvent) => {
    const _self: HTMLAnchorElement = event.currentTarget as HTMLAnchorElement;
    event.preventDefault();
    const imgPreview: HTMLImageElement = _self.previousElementSibling as HTMLImageElement;
    const imgInput = imgPreview.previousElementSibling as HTMLInputElement;
    imgInput.value = "";
    imgPreview.remove();
    _self.remove();
  };

  handleRemoveSocialEvent = (event: MouseEvent) => {
    event.preventDefault();
    const _self: HTMLAnchorElement = event.currentTarget as HTMLAnchorElement;
    const socialSection = _self.parentElement;
    this.addSocialForm.dataset.optionsCount = (+this.addSocialForm.dataset.optionsCount - 1).toString();

    // * Verify if user really want to remove
    if (!confirm("Are you sure you want to remove this social?")) return;
    socialSection.remove();
  };

  changeInputValue(input: HTMLInputElement, value: string) {
    input.value = value;
    input.dispatchEvent(new Event("input", { bubbles: true }));
  }

  addEventForAddMoreBtn() {
    const createNewSocialIconContainer: (count: number) => HTMLDivElement = (count: number) => {
      const newSocialIconContainer = document.createElement("div");
      newSocialIconContainer.classList.add("jins-social__social-icon");

      const newSocialIconInput = document.createElement("input");
      newSocialIconInput.type = "hidden";
      newSocialIconInput.name = `jins_social_plugin_dashboard[${count}][social_icon]`;

      const newSelectIconBtn = document.createElement("a");
      newSelectIconBtn.classList.add("button", "jins-social__select-icon-btn");
      newSelectIconBtn.href = "javascript:void(0);";
      newSelectIconBtn.textContent = "Select Icon";
      newSelectIconBtn.addEventListener("click", this.handleSelectIconEvent.bind(this));

      newSocialIconContainer.append(newSocialIconInput, newSelectIconBtn);
      return newSocialIconContainer;
    };
    this.addMoreBtn.addEventListener("click", (event: MouseEvent) => {
      let count = +this.addSocialForm.dataset.optionsCount;
      this.addSocialForm.dataset.optionsCount = (count + 1).toString();
      event.preventDefault();
      const newSocialSection = document.createElement("div");
      newSocialSection.classList.add("jins-social__social-section");

      const newSocialNameInput = document.createElement("input");
      newSocialNameInput.type = "text";
      newSocialNameInput.name = `jins_social_plugin_dashboard[${count}][social_name]`;
      newSocialNameInput.placeholder = "Social Name";

      const newSocialUrlInput = document.createElement("input");
      newSocialUrlInput.type = "text";
      newSocialUrlInput.name = `jins_social_plugin_dashboard[${count}][social_url]`;
      newSocialUrlInput.placeholder = "Social URL";

      const newSocialIconContainer = createNewSocialIconContainer(count);

      const newRemoveSocialBtn = document.createElement("a");
      newRemoveSocialBtn.classList.add("button", "jins-social__remove-social-btn");
      newRemoveSocialBtn.href = "javascript:void(0);";
      newRemoveSocialBtn.textContent = "Remove";
      newRemoveSocialBtn.addEventListener("click", this.handleRemoveSocialEvent.bind(this));

      newSocialSection.append(newSocialNameInput, newSocialUrlInput, newRemoveSocialBtn, newSocialIconContainer);
      this.addSocialForm.insertBefore(newSocialSection, this.addMoreBtn);
    });
  }

  addEventForRemoveSocialBtns () {
    this.removeSocialBtns.forEach((btn: HTMLAnchorElement) => {
      btn.addEventListener("click", this.handleRemoveSocialEvent.bind(this));
    });
  }

  addEventForSelectIconBtns () {
    this.selectIconBtns.forEach((btn: HTMLAnchorElement) => {
      btn.addEventListener("click", this.handleSelectIconEvent.bind(this));
    });
  }

  addEventForRemoveIconBtns () {
    this.removeIconBtns.forEach((btn: HTMLAnchorElement) => {
      btn.addEventListener("click", this.handleRemoveSocialIconEvent);
    });
  }
}
