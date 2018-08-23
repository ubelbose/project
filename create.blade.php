{{--
このコードだけでは動きません
実際の機能は下のURLでお願いします
URL : http://52.78.122.145/main/create
--}}


@extends('layouts.master')
@section('content')

    <style>
        
        
        
        .thumbnail-form {
            display: grid;
            justify-content: space-between;
            grid-template-columns: auto 220px;
            margin: auto;
            
        }
        
        #thumbnailImg {
            width: 200px;
            height: 200px;
        }
        
        #scoreInfo {
            display: grid;
            justify-content: space-between;
            grid-template-columns: 55% 45%;
            
        }
        
        #status {
            display: none;
        }
    
    </style>


    <!--楽譜テーブル-->
    <div class="menuLogo" align="center">
        <div class="SP-title"> 
            <div></div>
            <div>
                <div></div>
                <div>Create</div>
                <div>Orgel&nbsp</div>
                <div>Sheet</div>
                <div></div>
            </div>
            <div>
                <div></div>
                <div>自由に音楽を作ってみましょう！</div>
                <div>クリックするだけで貴方だけの曲を作ることができます。<br>完成した曲はオルゴールで演奏することもできますよ。</div>
                

            </div>
        </div>
    
    <div class="baseBoard container">
        <div id="scoreInfo">
            <div  style="margin:20px;">
                <div>
                    <input class="pointInfo" type="text" name="scoreTitle" placeholder="タイトル" style="width:90%"/>
                </div>
                
                <div style="margin-top:10px;">
                    
                    <select class="pointInfo" name="scoreCategory">
                        <option selected>Category</option>
                        @foreach($category as $row)
                        <option value="{{$row->bca_id}}">{{$row->bca_value}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div style="margin-top:10px;">
                    <textarea class="pointInfo" name="scoreComment" placeholder="ここに説明を書いてください" style="width:90%; min-height:100px; text-align:left;vertical-align:text-top; overflow:auto"></textarea>
                </div>
            </div>
            
            <div class="thumbnail-form">
                <div class="form-group">
                    <label name="file" for="file">Thumbnail</label>
                    <input type="file" name="thumbnail" value="Select" accept="image/*"/>
                </div>
                <div id="thumbnailImg"></div>
                <div id="status"></div>
            </div>
        </div>
        
            
    
        <div id="musicscore">
            <!--<div id="musicGear"></div>-->
            <table class="table table-piano table-bordered table-hover table-condensed" id="pianoTable" style="user-select: none;">
                <!--멜로디 순서-->
                <thead id="theadOfPianoTable" ></thead>
                <!--//악보-->
                <tbody id="tbodyOfPianoTable">
                    <?php
                    include_once '../app/keyboard.php';
                    $temp = new keyboard();
                    $temp->createTable();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div style="width:100%;overflow:auto">
    <div id="musicPiano">
        
        <ul class="set musicPiano">
            <li class="white c" name="40"></li>
            <li class="black cs disable" name="41"></li>
            <li class="white d" name="42"></li>
            <li class="black ds disable" name="43"></li>
            <li class="white e disable" name="44"></li>
            <li class="white f disable" name="45"></li>
            <li class="black fs disable" name="46"></li>
            <li class="white g" name="47"></li>
            <li class="black gs disable" name="48"></li>
            <li class="white a" name="49"></li>
            <li class="black as disable" name="50"></li>
            <li class="white b" name="51"></li>
            
            <li class="white c" name="52"></li>
            <li class="black cs disable" name="53"></li>
            <li class="white d" name="54"></li>
            <li class="black ds disable" name="55"></li>
            <li class="white e" name="56"></li>
            <li class="white f" name="57"></li>
            <li class="black fs" name="58"></li>
            <li class="white g" name="59"></li>
            <li class="black gs" name="60"></li>
            <li class="white a" name="61"></li>
            <li class="black as" name="62"></li>
            <li class="white b" name="63"></li>
            
            <li class="white c" name="64"></li>
            <li class="black cs" name="65"></li>
            <li class="white d" name="66"></li>
            <li class="black ds" name="67"></li>
            <li class="white e" name="68"></li>
            <li class="white f" name="69"></li>
            <li class="black fs" name="70"></li>
            <li class="white g" name="71"></li>
            <li class="black gs" name="72"></li>
            <li class="white a" name="73"></li>
            <li class="black as" name="74"></li>
            <li class="white b" name="75"></li>
            
            <li class="white c" name="76"></li>
            <li class="black cs disable" name="77"></li>
            <li class="white d" name="78"></li>
            <li class="black ds disable" name="79"></li>
            <li class="white e" name="80"></li>
            
            
            
            
        </ul>
    </div>
    </div>
    <!--機能-->
    <div id="div_musicController" style="padding-top:10px">
        <button class="pointButton btn-play " id="button_play"><img height="23px" style="width:50px;object-fit:contain"></button>
        <input type="text" id="input_musicLength" disabled style="text-align:center"/>
        <button class="pointButton" id="button_convert">コピー</button>
        <button class="pointButton" id="button_clear">クリア</button>
        <button class="pointButton" id="button_read">テキストで編集</button>
        <button class="pointButton" id="button_save_overwrite">上書きセーブ</button>
        <button class="pointButton" id="button_save_new">新規セーブ</button>
        @php
        if(preg_match("/edit/",$_SERVER["REQUEST_URI"]))
            echo "<button class=\"pointButton\" id=\"button_delete\">楽譜削除</button>"
        @endphp
        
        
       
        　Tempo　<input type="text" id="input_tempo" placeholder="Tempo" value=80 style="width:5em; text-align:center" class="pointInfo">
        
        
        　StartPoint　<input  type="text" id="input_startPoint" placeholder="Record Number" style="width:8em; text-align:center" class="pointInfo">
        　EndPoint　<input  type="text" id="input_endPoint" placeholder="Record Number" style="width:8em; text-align:center" class="pointInfo"> 
        
    </div>
    
    <div id="tempoModal" class="modal modal-lg fade" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">템포 변조</h4>
            </div>
            <div class="modal-body">
                <div id="tempoList"></div>
                <button class="btn btn-default" id="button_tempo_change">+</button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            
        </div>
        
    </div>


    <!-- view Thumbnail img before uploading -->

<script>
    var upload = document.getElementsByName('thumbnail')[0];
    var thumbnailImg = document.getElementById('thumbnailImg');
    var status = document.getElementById('status');
    
    if (typeof window.FileReader === 'undefined') {
        status.className = 'fail';
    } else {
        status.className = 'success';
        status.innerHTML = 'File API & FileReader available';
    }
     
     // checkpoint
    upload.onchange = function (e) {
        
        e.preventDefault();
    
        var file = upload.files[0];
        var reader = new FileReader();
        
        reader.onload = function (event) {
            var img = new Image();
            img.src = event.target.result;
            // note: no onload required since we've got the dataurl...I think! :)
            
            img.width = 200;
            img.height = 200;
            
            thumbnailImg.innerHTML = '';
            thumbnailImg.appendChild(img);
        };
      
      reader.readAsDataURL(file);
    
      return false;
      };
</script>


<!--<script type="text/javascript" src="{{asset('js/musicbox.js?ver=2')}}"></script>    -->
<script type="text/javascript" src="{{asset('js/audio.js?ver=11')}}"></script>
<script type="text/javascript">




  
    
var audioHandler;
var MAX_NOTES = 30;
var FIRST_NOTES = 48;
var scorenum = "";
// var tempoArray = [createTempoPoint(1,80)];
var recordYourMove = [];
var recordForRedo = [];



//初期動作
{
    
    
    
    if(location.href.search("edit") > -1||location.href.search("xml") > -1){
        
        openScore();
    }
    else
        tableCreate(FIRST_NOTES);
    
}


//テーブル政策及び追加
function tableCreate(max) {
    for(var i = 0; i < max; i++){
        createHead();

        for(var j = 0; j < MAX_NOTES; j++) {
            createScore(j);
        }
    }
}//function-end

//上段横ナンバーリング追加
function createHead() {
    var thead = document.getElementById('theadOfPianoTable');


    if(thead.childElementCount === 0) {
        var list = document.createElement('th');
        list.innerText = "・";
        thead.appendChild(list);
    }
    var createdTH = document.createElement('th');
    createdTH.innerText = thead.childElementCount;
    thead.appendChild(createdTH);
}

//楽譜入力制作
function createScore(i) {

    var tbody = document.getElementById('tbodyOfPianoTable');
    var createdTD = document.createElement('td');
    var createdIMG = document.createElement('img');


    createdTD.setAttribute('name',tbody.children[i].firstChild.id);
    createdTD.classList.add('cell-piano');
    
    
    createdIMG.classList.add('image-unput');
    
    
    if(tbody.children[i].childElementCount%8 == 0)
        createdTD.innerHTML = tbody.children[i].firstChild.innerHTML;
    else
        createdTD.innerHTML = "　";
    
    createdTD.appendChild(createdIMG);
    
    tbody.children[i].appendChild(createdTD);
    
}


//楽譜をクリックした時、音を再生
$('#tbodyOfPianoTable').on('click','.cell-piano',function () {

    
    //クラス追加
    this.classList.toggle("cell-piano-input");

    //REDO変数
    recordForRedo = [];

    if(this.classList.contains("cell-piano-input")){
        
        var audio = document.createElement('audio');
        audio.setAttribute('src',"{{asset('wav/note')}}/note\_"+this.getAttribute('name')+".wav");
        audio.play();
        
        
        
        recordHistory('input',this.cellIndex,this.parentElement.rowIndex);
    }
    else{
        recordHistory('output',this.cellIndex,this.parentElement.rowIndex);
    }

    var maxRecord = event.target.parentElement.parentElement.parentElement.firstElementChild.childElementCount;

    if(event.target.cellIndex >= maxRecord-3){
        tableCreate(8);
        screenChaser($('#theadOfPianoTable')[0].childElementCount);
    }
}); 




//再生機能再生イベント
$('#div_musicController').on('click','.btn-play',function() {
        //オーディオ初期化
        window.clearInterval(audioHandler);
        

        
        
        //実行の長さを取得
        var currentLine = parseInt($('#input_startPoint')[0].value);
        var endLine = parseInt(('#input_endPoint')[0].value);

        if(!currentLine)
            currentLine = 0;

        if(!endLine)
            endLine = document.getElementById('theadOfPianoTable').children.length - 1;

        //テンポ取得
        var tempo = getTempo($('#input_tempo')[0].value);

        //楽譜取得
        var stringArray = convertString().split(";")[1].split("r");
        
        audioHandler = setInterval(function () {
            try {
                removeFocus('line-focus');
            } catch(e){

            }

        //画面の長さを取得
        var screenLine = parseInt(window.screen.width/33);

            //スクロール移動
            if(currentLine%screenLine == 0 && currentLine !== 0)
                screenChaser(screenLine);
            
            //ポーカス及び再生機能
            try {
                if(stringArray[currentLine] != undefined){
                    focusLine(parseInt(currentLine)+2);
                    audioPlay2(stringArray[currentLine]);
                }
                
                
                // time
                var musicLength = getMusicLength(endLine, tempo);
                var current     = getMusicLength(currentLine, tempo);
        
                    document.getElementById('input_musicLength').value = current+" / "+musicLength;
                
            } catch (e){
                console.log("음원 실행 오류");
            }


            //オートエンド
            if(currentLine + 1 >= endLine){
                window.clearInterval(audioHandler);
                
                var endTimer = setTimeout(function(){
                    removeFocus('line-focus');
                    audioHandler = undefined;
                    document.getElementById('musicscore').scrollTo(0,scrollY);
                    musicStop();
                },1000);
            }

            currentLine++;
        },tempo);

        buttonChange(event.target);
    }
);

//終了イベント
$('#div_musicController').on('click','.btn-stop',function() {
    musicStop();
});

//楽譜→オルゴールString変換イベント
$('#button_convert').click(
    function () {
        convertString(1);
    }
);

//楽譜初期化
$('#button_clear').click(
    
    function() {
        clearScore();
    }    
        
    
);

//オルゴールString→楽譜変換イベント
$('#button_read').click(
    function () {
        openScore();
    }
);

//マウスイベント：楽譜ポーカス
$('#tbodyOfPianoTable').on("mouseenter",".cell-piano", function() {
    if(audioHandler == undefined)
    crossFocus(event);
}).on('mouseleave','.cell-piano', function() {
    
    removeFocus('crossFocus')
});

//停止
function musicStop(){
    stop_music();
    buttonChange($('#button_play')[0]);
    currentLine = 0;
    removeFocus('line-focus');
    $("#input_musicLength")[0].value = "";
}


//始まる地点設定
$('#theadOfPianoTable').on('click','th',function () {
    var clickPoint = event.target.innerHTML;
    if(clickPoint != "항목"){
        $('#input_startPoint')[0].value = clickPoint;
    }
});

//終了地点設定
$('#theadOfPianoTable').on('dblclick','th',function () {
    var clickPoint = event.target.innerHTML;
    if(clickPoint != "항목"){
        $('#input_endPoint')[0].value = clickPoint;
    }
});

//新しく保存
$('#button_save_new').click(function() {
    sendScore();
    // 0413 민석 추가
    
})

//楽譜上書き
$('#button_save_overwrite').click(function() {
    if(location.href.search('edit') > -1)
        overwriteScore();
    else
        sendScore();
})

//楽譜削除
$('#button_delete').click(function() {
    deleteScore();
})




//keydown events
$(this).keydown(function (event){
    
    if(event.which == 90 && event.ctrlKey && event.shiftKey){
        redo();
        // console.log('ctrl+shift+z was pressed');
    }
    else if(event.which == 90 && event.ctrlKey){
        undo();
        // console.log('ctrl+z was pressed');
    }
});
    
$('.musicPiano>li').click(function(){
    
        
        try{
            var audio = document.createElement('audio');
            audio.setAttribute('src',"{{asset('wav/note')}}/note\_"+this.getAttribute('name')+".wav");
            audio.play();
        }
        catch(e){
            e;
        }
    
}
        );



// ------------------------------------------------------------------------------

//再生する音リストを取得
function getPlaylist(line) {
    var table = document.getElementById('tbodyOfPianoTable');
    var lineArray = new Array();
    for(var i = 0; i < table.children.length;i++){
        var selected = table.children[i].children[line];
        if($(selected).is(".cell-piano-input") === true)
            lineArray.push(table.children[i].children[line].getAttribute('name'));
    }

    return lineArray;
}

//音を再生
function audioPlay2(scoreString) {
    var scoreArray = getPlayList2(scoreString);
    var audio = "";
    var src = "";
    
    $('ul.set>li.active').removeClass('active');
    
    if(scoreArray != undefined){
        for(var i = 0; i < scoreArray.length; i++){
                
                $("li[name*="+scoreArray[i]+"]").addClass('active')
                src = "{{asset('wav/note')}}/note_"+scoreArray[i]+".wav";
                audio = new Audio(src);
                audio.play();
            
            
        }
    }
    else
        return 0;
}

//再生する音源リストを習得
function getPlayList2(scoreString){
    //"YA"를 받으면 그걸 분해해서 숫자로 바꾼 뒤 배열로 리턴
    
    var scoreArray;
    if(scoreString != ""){
        var scoreLength = scoreString.length;
        
        scoreArray = new Array(scoreLength);
        
        for(var i = 0; i < scoreLength; i++){
            scoreArray[i] = convertScoreStringToWaveNum(scoreString[i]);
        }
    }
    return scoreArray;
}

//楽譜→オルゴールStringコンバート
function convertString(copyStatus) {
    var maxOfLine = document.getElementById('theadOfPianoTable').children.length - 1;
    var melodyArray = new Array();
    var melodyString = "";
    var currentPlayList = "";
    
    for(var i = 0; i < maxOfLine; i++) {
    
        currentPlayList = getPlaylist(i + 1);
    
        if(currentPlayList != ""){
    
            for(var j = 0; j < currentPlayList.length; j++) {
                currentPlayList[j] = String.fromCharCode(parseInt(currentPlayList[j])+25);
            }
    
            melodyArray.push(currentPlayList);
        }
        else
            melodyArray.push(0);

            melodyArray.push("r");
    }

    var tempo = $('#input_tempo')[0].value;

    if(tempo == ""){
        tempo = 80;
    }

    melodyString += tempo+";";

    for(var i = 0; i < melodyArray.length; i++){
            for(var j = 0; j < melodyArray[i].length; j++){
                melodyString += melodyArray[i][j];
            }

        }

    while(melodyString.search(/rr$/) > -1) {
        melodyString = melodyString.replace(/rr$/,"r");
    }

    
    if(copyStatus){
    var temp = document.createElement('input');
    temp.type = 'text';
    
    
    $('body').append(temp);
    temp.value = melodyString;
    temp.select();
    document.execCommand('copy');
    temp.remove (this);
    }
    
    
    return melodyString;
}


  



//テンポで曲のスピードを取得
function getTempo(argTempo) {
    var inputTempo =    argTempo;

    if(inputTempo == "" || inputTempo <= 0)
        inputTempo = 80;

        inputTempo = 300 / inputTempo * 100 ;
        // 30 == 1000
        //

    return inputTempo;

}

//音楽の長さ
function getMusicLength(endLine, tempo){
    var maxOfSecond = endLine * tempo / 1000;
    var h = Math.floor(maxOfSecond / 3600);
    var m = Math.floor(maxOfSecond / 60) - h * 60;
    var s = Math.ceil(maxOfSecond - h * 3600 - m * 60);
    var lengthString = h + ":" + m + ":" + s;
    
    return lengthString;
}

//楽譜初期化
function clearScore() {
    
        
    window.clearInterval(audioHandler);
    
    $('#theadOfPianoTable>th').remove();
    $('.cell-piano').remove();
    tableCreate(FIRST_NOTES);
}

//オルゴールString→楽譜
function openScore(){

    var scoreString;

    
    var scoreInfoArray = readScoreFromDB();
    
    if(scoreInfoArray == 0)
        scoreString = prompt("楽譜コード入力");
    else
        scoreString = scoreInfoArray.scorestring;

    if(scoreString === "" || scoreString === null)
        return 0;

    clearScore();

    var tempo = scoreString.split(";")[0];
    var score = scoreString.split(";")[1].split("r");
    var convertScore = [];

    tableCreate(score.length + score.length%4 - 24);


    // console.log(score);

    for(var i = 0; i < score.length; i++) {
        if (!convertScore[i])
            convertScore[i] = [];


        for (var j = 0; j < score[i].length; j++) {

            var convertString = score[i][j].charCodeAt().valueOf();


            convertScore[i][j] = convertString;
        }
    }

    $('#input_tempo')[0].value = tempo;

    for(var i = 0; i < convertScore.length; i++)
        for(var j = 0, k = 0; j < MAX_NOTES; j++){
            var currentScore = document.getElementById('tbodyOfPianoTable').children[j].children[i+1];
            if(currentScore.getAttribute('name') == convertScore[i][k] - 25) {
                currentScore.classList.add("cell-piano-input");
                
                k++;
            }
        }
    }

//楽譜ポーカスｂｙCSS
function focusLine(currentLine) {
    var head = $('#pianoTable')[0].children[0].children[currentLine];
    var body;

    head.classList.add('line-focus');


    $('#tbodyOfPianoTable>tr>td:nth-child('+currentLine+'):not(.cell-piano-input)').toggleClass('line-focus');

}

//楽譜ポーカスキャンセル
function removeFocus(focusName){

    $('.'+focusName).removeClass(focusName)
}

//スクロール移動
function screenChaser(line) {
    var cellWidth = document.getElementsByName('80')[0].offsetWidth;
    
    document.getElementById('musicscore').scrollBy(cellWidth*line,0);
}

//マウスで楽譜ポーカス
function crossFocus(event){
    
    var target = event.target;
    
    var horizonElements = target.parentElement;
    var currentLine = target.cellIndex;
    var currentRow = target.parentElement.rowIndex;
    var endLine = document.getElementById('theadOfPianoTable').children.length;
    
    try{
        for(var i = -1; i < 8; i++){
            var focusLine = parseInt(currentLine/8)*8+1+i;
            var tempTarget = target.parentElement.parentElement.children[i];
            
            if(!horizonElements.children[focusLine].classList.contains('cell-piano-input'))
                horizonElements.children[focusLine].classList.toggle('crossFocus');
            
    }
    
    
    }catch(e){
        
        
    }
}

// checkpoint
//악보 스트링 전송
function sendScore(){
    var scoreString = convertString(0);
    var tempo = scoreString.split(";")[0];
    var score = scoreString.split(";")[1];
    var title = document.getElementsByName('scoreTitle')[0].value;
    var category = document.getElementsByName('scoreCategory')[0].value;
    var comment = document.getElementsByName('scoreComment')[0].value;
    var token = "{{ csrf_token() }}";
    
    
    var fileobj = document.getElementsByName('thumbnail')[0].files[0];
    var fileName;
    
    // var thumbnail = fileobj.files[0];
    
    if(fileobj){
        
        for(key in fileobj){
            if(key == "name"){
                fileName = fileobj[key];
            }
        }
    
    }else {
    
    }

    
    //alert(fileobj);
    
    var formData = new FormData();
    
    formData.append("tempo",tempo);
    formData.append("score",score);
    formData.append("title",title);
    formData.append("category",category);
    formData.append("comment",comment);
    formData.append("thumbnail",fileobj,fileName);
    formData.append(" _token",token);

    
    
    if(title == ""){
        alert('タイトルを入力してください.');
        
            return -1;
        
    }
    
    if(category == "Category"){
        alert('カテゴリーを選んでください.');
        
            return -1;
        
    }
    
    
    
    $.ajax({
        type: "POST",
        url: "{{route('main.store')}}",
        data: formData,
        processData: false,
        contentType: false, 
        success: function( json ) {
            alert("アップロード成功");
            alert(json.msg);
            // alert(json.scorenum);
        scorenum = "/"+json.scorenum; 
        
        
        if(scorenum == '/undefined'){
        location.href = "../login";
        }
        else{
        history.replaceState({},"/main/create","/main"+scorenum+"/edit")
        //페이지 이동하시겠습니까?? YES/NO 창 필요.
        
        location.replace("{{route('getScore')}}");
        }
            
            
        }
    });
   
    
}

//DB에서 악보 정보 불러오기
function readScoreFromDB(){
    
        var temp        = {!!json_encode($post)!!};
        var title       = temp.subject;
        var category    = temp.category;

        var comment     = temp.describe;
        // var scoreString = temp.scorestring;
        if(title == undefined)
            title = "";
        if(category == undefined)
            category = "장르";
        if(comment == undefined)
            comment = "";        
    
    
        
        document.getElementsByName('scoreTitle')[0].value   = title;
        document.getElementsByName('scoreCategory')[0].value = category ;
        document.getElementsByName('scoreComment')[0].value = comment;
        
    
    //select 악보스트링 where 악보아이디 = scoreId    
    
    
    
    
    return temp;

}


function overwriteScore(){
    
        //악보 덮어쓰기 함수
        //ID가 같은 score 정보를 현재의 정보로 덮어쓴다.
       
    
        //전송 정보 목록
        var scoreString = convertString(0);
        var tempo = scoreString.split(";")[0];
        var score = scoreString.split(";")[1];
        var title = document.getElementsByName('scoreTitle')[0].value;
        var category = document.getElementsByName('scoreCategory')[0].value;
        var comment = document.getElementsByName('scoreComment')[0].value;
        var token = "{{ csrf_token() }}";
        var _method="put";
        
        var fileobj = document.getElementsByName('thumbnail')[0].files[0];
        var fileName;
        
        // var thumbnail = fileobj.files[0];
        
        if(fileobj){
           
            for(key in fileobj){
                if(key == "name"){
                    fileName = fileobj[key];
                }
            }
        
        }
        
        //alert(fileobj);
        
        var formData = new FormData();
        
        formData.append("tempo",tempo);
        formData.append("score",score);
        formData.append("title",title);
        formData.append("category",category);
        formData.append("comment",comment);
        formData.append("thumbnail",fileobj,fileName);
        formData.append(" _token",token);
        formData.append('_method',_method);
    
        if(title == ""){
            alert('タイトルを入力してください.');
            return -1;
        }
    
        if(category == "장르"){
            alert('ジャンルを選んでください.');
            return -1;
        }
        
    //DB로 쓩!
        $.ajax({
            type: "POST",
            url: "{!! route('main.update',isset($post->score_id) ? $post->score_id : "")!!}"+scorenum,
            data: formData,
            processData: false,
            contentType: false,
            //성공시 알림이 떠야하는데 jquery를 모르겠다...
            success: function( json ) {
                alert(json.msg);
                
                location.replace("{{route('getScore')}}");
                }
            });
        }
    
function deleteScore(){
    if(confirm("楽譜が削除されます。")){
        
        var scoreId = {!! isset($post->score_id) ? $post->score_id : 0 !!};
        
        
        
        if(scoreId > 0){
            var _method = "DELETE";
            $.ajax({
                type: "post",
                url: "{!!route('main.destroy',isset($post->score_id) ? $post->score_id : "")!!}",
                //score_id를 받아가서 해당 악보를 제거하는 행위가 필요. 해당 파일에서 삭제 실행자가 제작자인지도 검사할 것.
                data:{_method:_method},
                
                success: function( json ){
                    alert(json.msg);
                    location.href = "../../score";
                }
                
                
            });
        }
        else{
            return -1;
        }
    }
    else{
        alert("キャンセルします.");
    }
}


    
    function createTempoPoint(argPoint, argTempo){
        var tempoArrayElement = {point:argPoint,tempo:getTempo(argTempo)};
        
        return tempoArrayElement;
    }
    
    
    //하단 피아노 조작
    function activePiano(scoreString){
        var scoreArray = getPlayList2(scoreString);
        var audio = "";
        var src = "";
        
        $('ul.set>li.active').removeClass('active');
        
        if(scoreArray != undefined){
            for(var i = 0; i < scoreArray.length; i++){
                
                    $("li[name*="+scoreArray[i]+"]").addClass('active')
                    
                
                
            }
        }
        else
            return 0;    
    }

    //악보 입력 순서 기록    
    function recordHistory(moveType, argCellIndex, argRowIndex){
        
        //Max : 20 move.
        if(recordYourMove.length >= 30)
            recordYourMove =  recordYourMove.filter(function(elem){return elem != recordYourMove[0]});
            
            recordYourMove[recordYourMove.length]={type:moveType,col:argCellIndex,row:argRowIndex};
    }
    
    //실행 취소
    function undo(){
       try{
       var order = recordYourMove[recordYourMove.length - 1];
       
       $('#tbodyOfPianoTable>tr')[order.row].children[order.col].classList.toggle('cell-piano-input');
        
        recordForRedo.push(order);
        
        recordYourMove =  recordYourMove.filter(function(elem){return elem != recordYourMove[recordYourMove.length - 1]});
       }
       catch(e){
           console.log('undo : 記録された行動がないです。');
       }
        
    }
    
    //실행 취소를 실행 취소
    function redo(){
        try{
        var reorder = recordForRedo[recordForRedo.length - 1];
        
        $('#tbodyOfPianoTable>tr')[reorder.row].children[reorder.col].classList.toggle('cell-piano-input');
        
        recordYourMove.push(reorder);
        
        recordForRedo =  recordForRedo.filter(function(elem){return elem != recordForRedo[recordForRedo.length - 1]});
        }
        catch(e){
            console.log('redo : 記録された行動がないです。');
        }
    }
    
</script>
    
@stop

