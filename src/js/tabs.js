let tab_buttons = document.querySelectorAll(
  ".tab_container .button_container button"
);

let tab_panels = document.querySelectorAll(".tab_container .tab_panel");

function ShowPanel(panelIndex, bgColor) {
  tab_buttons.forEach(node => {
    node.style.backgroundColor = "";
  });

  tab_buttons[panelIndex].style.backgroundColor = bgColor;
  tab_buttons[panelIndex].children[0].style.color = "white";

  tab_panels.forEach(node => {
    node.style.display = "none";
  });

  tab_panels[panelIndex].style.display = "block";

  if ($(".reparatie_tab").css("backgroundColor") == "rgb(42, 31, 162)") {
    $(".tab_text_reparatie").css("color", "white");
  } else {
    $(".tab_text_reparatie").css("color", "#676767");
  }

  if ($(".wegsleep_tab").css("backgroundColor") == "rgb(42, 31, 162)") {
    $(".tab_text_wegsleep").css("color", "white");
  } else {
    $(".tab_text_wegsleep").css("color", "#676767");
  }

  if ($(".keuring_tab").css("backgroundColor") == "rgb(42, 31, 162)") {
    $(".tab_text_keuring").css("color", "white");
  } else {
    $(".tab_text_keuring").css("color", "#676767");
  }
}

ShowPanel(0, "#2a1fa2");
