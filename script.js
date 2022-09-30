function populate(s1,s2) {

    var s1 = document.getElementById('slct1');
    var s2 = document.getElementById('slct2');
    s2.innerHTML = "";

    if(s1.value == "elektro") {
        var optionArray = ["|", "lednice|Lednice", "tiskarna|Tiskarna", "kavovar|Kavovar",];

    } else if(s1.value == "pocitace") {
        var optionArray = ["|", "pc|Pc", "notebook|Notebook",];

    } else  if(s1.value == "nabytek") {
        var optionArray = ["|", "zidle|Židle", "gauc|Gauč", "stul|Stul",];

    }

    for (var option in optionArray) {
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);

    } 
    
}

var cars ={
    sedan:['honda', 'das', 'auto'],
    suv:['black', 'whiote','dsa'],
    hatcar:['bighat', 'small hat', 'medium hat']

}

var main = document.getElementById('main_menu');
var sub = document.getElementById('sub_menu');

main.addEventListener('change', function() {
    var selected_option = cars[this.value];
while(sub.options.length > 0) {
    sub.options.remove(0);
}

Array.from(selected_option).forEach(function(el){
    let option = new Option(el, el);
    sub.appendChild(option);
});


})   ;

