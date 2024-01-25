const dropdownMenu = document.getElementById("dropdown-menu");
const handleDropdownClicked = (event) => {
  event.stopPropagation();
  toggleDropdownMenu(!dropdownMenu?.classList?.contains("open"));
};

const handleMenuLabelClicked = (label) => {
  if (label) {
    const menuLabels = document.getElementsByClassName(
      "secondary-menu__labels"
    );
    for (let m of menuLabels) {
      m.classList.remove("open");
    }
    const dropdownMenuLabels = document.getElementById(label);
    dropdownMenuLabels.classList.add("open");
  }
  const primaryMenu = document.getElementById("primary-menu");
  primaryMenu.classList.toggle("open");
};

const toggleDropdownMenu = () => {
  const dropdownMenu = document.getElementById("dropdown-menu");
  dropdownMenu.classList.toggle("open");
  const dropdownIcon = document.getElementById("dropdown-icon");
  dropdownIcon.innerText = dropdownMenu.classList.contains("open")
    ? "close"
    : "expand_more";
};
