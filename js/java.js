function toggleSidebar(){
document.getElementById('sidebar').classList.toggle('active');
}


    
    
     
    function toggleClose(){
    document.getElementById('Scrollbar').style.display ="none";
    document.getElementById('profilePic').style.display ="block";
    }
        
    function toggleBill(){
        document.getElementById('bill').style.display ="inline-block";
        document.getElementById('Scrollbar').style.display ="none";
        document.getElementById('sidebar').classList.toggle('active');
    }
     
    function toggleClose1(){
    document.getElementById('bill').style.display ="none";
    document.getElementById('profilePic').style.display ="block";
    document.getElementById('Scrollbar').style.display ="inline-block";
    }
    function togDet(){
        document.getElementById('bill').style.display ="none";
    }

//More Payment options
    function togglePart(){
        document.getElementById('partPay').style.display ="inline-block";
        document.getElementById('moreOpt').style.display ="none";
    }
     
    function optClose(){
    document.getElementById('moreOpt').style.display ="inline-block";
    document.getElementById('partPay').style.display ="none";
    }
//SEARCH 
    function search(firstname){
        console.log(firstname);
        fetchSearchData(firstname)
    }

    function fetchSearchData(firstname){
        fetch('search.php', {
            method: 'POST',
            body: new URLSearchParams('firstname=' + firstname)
        })
        .then(res => res.json())
        .then(res => viewSearchResult(res))
        .catch(e => console.error('Error: ' + e))
    }
    function viewSearchResult(data){
        const dataViewer = document.getElementById("dataViewer");

        dataViewer.innerHTML = "";

        for (let i = 0; i < data.length; i++){
            const li = document.createElement("li");
            li.innerHTML = data[i]["firstname"];
            dataViewer.appendChild(li);
        }
    }

    //Toggle profile details
    function toggleDetails(){
        document.getElementById('Scrollbar').style.display ="inline-block";
        document.getElementById('profilePic').style.display ="none";
        document.getElementById('sidebar').classList.toggle('active');
    }