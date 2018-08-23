//for Share Board Functions

var audioHandler;
var currentLine = 0;

// 음악 재생
function play_music(scoreString){
    window.clearInterval(audioHandler);
    currentLine = 0;
    
    
    var tempo = 300 / scoreString.split(";")[0] * 100;
    var ArrayOfScoreString = scoreString.split(";")[1].split("r");
    
    var endLine = ArrayOfScoreString.length - 1;
    
    audioHandler = setInterval(function (){
        
        var currentMelody = ArrayOfScoreString[currentLine];
        
        try{
            for(var i = 0; i < currentMelody.length; i++){
                var note = convertScoreStringToWaveNum(currentMelody[i]);
                play_audio(note);
                // console.log("작동 중");
            }
        }
        catch(e){
            console.log("error catch");
        }
        
        
        
        //music end event
        if(currentLine == endLine){
            window.clearInterval(audioHandler);
            currentLine = 0;
            setTimeout(function(){
                buttonChange($('.btn-stop')[0]);
            },2000);
        }
        else{
            currentLine++;
        }
    },tempo);
    
    
    // console.log(ArrayOfScoreString);
}


// 
function convertScoreStringToWaveNum(argString) {
    return argString.charCodeAt()-25;
}

// 음원 재생
function play_audio(noteNum) {
    var src = "../wav/note/note_"+noteNum+".wav";
    
    var audio = new Audio(src);
    audio.play();
    return;
}

// 시작&정지 버튼 변환
function buttonChange(argTarget){
    
    
    var target;
    
    switch (argTarget.localName) {
        case 'button':
            target = $('#'+argTarget.id)[0];
            break;
        case 'img':
            target = $('#'+argTarget.parentElement.id)[0];
            break;
        case 'div':
            target = $('#'+argTarget.id)[0];
            break;
        default:
            // code
            break;
    }
    
    
    
    
    
    var previousTarget = $('.btn-stop')[0];
    
    if(previousTarget != undefined && target != previousTarget){
        previousTarget.classList.toggle("btn-play");
        previousTarget.classList.toggle("btn-stop");
        // previousTarget.src = "/img/stopButton_icon.png";
    }
    
    
    target.classList.toggle("btn-play");
    target.classList.toggle("btn-stop");
    
    // if(target.classList.contains("btn-play"))
    //     // target.src = "/img/stopButton_icon.png";
    // else {
    //     // target.src = "/img/stopButton_icon.png";
    // }
}

// 정지
function stop_music() {
    window.clearInterval(audioHandler);
}