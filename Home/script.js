  function sushiFunction() {
      var sushiImg = document.getElementById("expimg1");
      var veganImg = document.getElementById("expimg2");
      var sushiTxt = document.getElementById("expdiv1");
      var veganTxt = document.getElementById("expdiv2");
      sushiImg.style.display = "inline-block";
      veganImg.style.display = "none";
      sushiTxt.style.display = "inline-block";
      veganTxt.style.display = "none";
  }

  function veganFunction() {
      var sushiImg = document.getElementById("expimg1");
      var veganImg = document.getElementById("expimg2");
      var sushiTxt = document.getElementById("expdiv1");
      var veganTxt = document.getElementById("expdiv2");
      sushiImg.style.display = "none";
      veganImg.style.display = "inline-block";
      sushiTxt.style.display = "none";
      veganTxt.style.display = "inline-block";
  }