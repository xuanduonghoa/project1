<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <style type="text/css">
        div.container {
    width: 60%;  
    margin: auto;  
}
/* định dạng thẻ div chưa các button tab */
div.tab {
    overflow: hidden; 
    border: 1px solid #ccc; 
    background-color: #f1f1f1; 
}
 
/* định dạng các button tab */
div.tab button {
    background-color: inherit; 
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}
 
/* đổi màu khi một button tab được hover */
div.tab button:hover {
    background-color: #ddd;
}
 
/* đổi màu nền cho tab đang được hiển thị nội dung */
div.tab button.active {
    background-color: #ccc;
}
 
/* định dạng nội dung hiển thị */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
    </style>
    <body>
        <h1>Học lập trình miễn phí tại Freetuts.net</h1>
        <div class="tab">
          <button class="tablinks">PHP</button>
          <button class="tablinks">HTML</button>
          <button class="tablinks">CSS</button>
        </div>

        <div id="PHP" class="tabcontent">
            <h3>PHP</h3>
            <p>
                PHP (viết tắt hồi quy "PHP: Hypertext Preprocessor") là một ngôn ngữ lập 
                trình kịch bản hay một loại mã lệnh chủ yếu được dùng để phát triển các ứng
                dụng viết cho máy chủ, mã nguồn mở, dùng cho mục đích tổng quát. Nó rất
                thích hợp với web và có thể dễ dàng nhúng vào trang HTML..
            </p>
        </div>

        <div id="HTML" class="tabcontent">
            <h3>HTML</h3>
            <p>
                HTML là chữ viết tắt của cụm từ HyperText Markup Language((Xem thêm tại 
                http://vi.wikipedia.org/wiki/HTML)) (dịch là Ngôn ngữ đánh dấu siêu văn bản)
                được sử dụng để tạo một trang web, trên một website có thể sẽ chứa nhiều trang
                và mỗi trang được quy ra là một tài liệu HTML (thi thoảng mình sẽ ghi là một tập tin HTML).
            </p> 
        </div>

        <div id="CSS" class="tabcontent">
            <h3>CSS</h3>
            <p>
                CSS là chữ viết tắt của Cascading Style Sheets, nó là một ngôn ngữ được sử dụng để
                tìm và định dạng lại các phần tử được tạo ra bởi các ngôn ngữ đánh dấu (ví dụ như HTML).
            </p>
        </div>
    
    </body>
	<script type="text/javascript">
    var buttons = document.getElementsByClassName('tablinks');
    var contents = document.getElementsByClassName('tabcontent');
    function showContent(id){
        for (var i = 0; i < contents.length; i++) {
            contents[i].style.display = 'none';
        }
        var content = document.getElementById(id);
        content.style.display = 'block';
    }
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function(){
            var id = this.textContent;
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove("active");
            }
            this.className += " active";
            showContent(id);
        });
    }
    showContent('PHP');
</script>
</html>