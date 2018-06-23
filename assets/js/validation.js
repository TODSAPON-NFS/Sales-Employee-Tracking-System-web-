
    function validatenum(){
        var number=document.getElementById("t1").value;
        var len=number.length;
        var phcode=number.substr(0,3);
        if(number==""){
            document.getElementById("err").innerHTML="empty";
            document.getElementById("t1").style.backgroundColor="red";
        }

        <!--NaN = add numbers only-->
        else if(isNaN(number)){
            document.getElementById("err").innerHTML="numbers only";
            document.getElementById("t1").style.backgroundColor="red";
        }

        else if(number!=0 && len!=10){
            document.getElementById("err").innerHTML="number is not valid";
            document.getElementById("t1").style.backgroundColor="red";
        }


        else if(phcode !=071 ||phcode !=072 ||phcode !=076 ||phcode !=077 ||phcode !=075||phcode !=078){
            document.getElementById("err").innerHTML="code is not valid";
            document.getElementById("t1").style.backgroundColor="red";
        }

        else{
            document.getElementById("err").innerHTML="";
        }

    }

