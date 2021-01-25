
$(document).ready(function () {
    App.getAds();
    $("input[name=file]").on('keyup',function () {
        readURL(this);
    });
    $('input[name=name]').on('keyup',function () {
        $('#placeholderName').text($(this).val());
    });
    $('input[name=description]').on('keyup',function () {
        $('#placeholderDescription').text($(this).val());
    });
    $('textarea[name=message]').on('keyup',function () {
        $('#placeholderMessage').text($(this).val());
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                //alert(e.target.result);
                $('#placeholderImg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
});

class App {
    constructor(props) {
        let { adImage, adName, adDescription, adMessage } = props;
        this.adImage = adImage;
        this.adName = adName;
        this.adDescription = adDescription;
        this.adMessage = adMessage;
    }
    static getAds() {
        let urlSubTestCats = "./api.php";
        fetch(urlSubTestCats).then(json => json.json()).then((data) => {
            let jsLenght = data.ads.length;
            let ad = data.ads;
            if (jsLenght!=0) {
                for (var i = 0; i < jsLenght; i++) {
                    $('.parseAdTableBody').append(
                        `<tr>
                    <td>${ad[i].name}</td>
                    <td>${ad[i].description}</td>
                    <td>${ad[i].message}</td>
                    <td>
                        <div style="width:100px;height:100px">
                            <img class="card-img-top" src="./upload/${ad[i].image}" alt="Card image cap" style="width:100%;height:100%;object-fit:contain;">
                        </div>
                    </td>
                </tr>`
                    );
                }
            }else{
                $('.parseAdTableBody').append("No Data");
            }
        });




    }
    static createAd(props) {
        console.log(props.adName);
        var fd = new FormData();


        fd.append('file', props.adImage);
        fd.append('name', props.adName);
        fd.append('description', props.adDescription);
        fd.append('message', props.adMessage);

        $.ajax({
            type: 'POST',
            url: 'api.php',
            contentType: false,
            processData: false,
            data: fd,
            success: function (response) {
                if (response == 1) {
                    // $('#listLink').removeClass("d-none");
                    alert("Ad creation successfull.");
                } else {
                    alert(response);
                }
            }
        });

    }
}
function createAdFunc() {

    var files = $('#file')[0].files;
    if (files.length > 0) {
        App.createAd({
            adImage: files[0],
            adName: $('input[name=name]').val(),
            adDescription: $('input[name=description]').val(),
            adMessage: $('textarea[name=message]').val()
        });
    } else {
        alert("Please select a file.");
    }
}



