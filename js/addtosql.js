$.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getUrlVar: function(name){
    return $.getUrlVars()[name];
  }
});

$(document).on("change", "input:radio",function(){
    var radio = $(this);
    var question = radio.prop("name");
    var option = radio.val();
	var paper = $.getUrlVar('id');
    $.ajax({
        type: "POST",
        url: "include/addtosql.php",
        dataType: "json",
        data: {"question":question, "option":option, "paper":paper}
    });
});

function submit(totalQuestion) {
	for(var i=1; i <= totalQuestion; i++){
            $("#"+i).removeAttr("style");
    }
    var questionWithoutOption = 0;
    for(var i=1; i <= totalQuestion; i++){
        var currentQuestion = $("input[name=\""+i+"\"]:checked").val();
        if(currentQuestion == undefined || currentQuestion == null){
            var flag = 1;
            $("#"+i).css("background-color", "red");
            questionWithoutOption += 1;
        }
    }
    if(flag){
        alert("您还有 "+ questionWithoutOption +" 题没有答完！");
        return false;
    } else {
        alert("提交成功！");
        window.location.href="select.php";
    }
}