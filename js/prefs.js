function setPrefs() //function which sets the font size of .display-4 elements on the site using the localStorage API
{
  $("#buttonSmall").click(function()
  {
      localStorage.setItem("userPrefs", "20px");
      $(".display-4").css('font-size', '20px');
  });

  $("#buttonMed").click(function()
  {
      localStorage.setItem("userPrefs", "40px");
      $(".display-4").css('font-size', '40px');
  });

  $("#buttonLarge").click(function()
  {
      localStorage.setItem("userPrefs", "60px");
      $(".display-4").css('font-size', '60px');
  });
}

function loadPrefs() //loads the user's preference each time the page is loaded and sets the CSS attribute "font-size" accordingly
{
  var header = localStorage.getItem("userPrefs");
  $(".display-4").css('font-size', header);
}

$(document).ready(function()
{
  loadPrefs(); //calls both methods when DOM is ready
  setPrefs();
});
