
document.getElementById("filterButton").addEventListener("click", filterToggle)

// On click, give style to filter menu to increase/decrease css: left; to display it

function filterToggle() {
  let filterL = window.getComputedStyle(document.getElementById("mapFilters")).getPropertyValue("left")
  let pageWidth = document.querySelector("html").offsetWidth
  if ((filterL == 0)||(filterL == "0px")){
    if (pageWidth <= 930){
      document.getElementById("mapFilters").style.left = "calc(-100% + 25px)"
    } else if (pageWidth > 930){
      document.getElementById("mapFilters").style.left = "-16%"
    }
  } else if (filterL != 0){
    document.getElementById("mapFilters").style.left = 0
  }
  console.log(`Left filter width is ${filterL}`)
  console.log(`Page width is ${pageWidth}`)
}


