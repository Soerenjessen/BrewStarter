<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Brew Starter</title>
    </head>
<body>

        <h1>Dette er BrewStarter - Til dig som ønsker at blive en Øl-Meistro</h1>
        
    
    
<script>
    
        // var inter = document.getElementById(inter).value;
        // Distance data.
    function distanceData(){
        
        var xhhtp = new XMLHttpRequest();
        xhhtp.onreadystatechange = function(){ 
            if (this.readyState == 4 && this.status == 200){
                var distancejason = JSON.parse(this.responseText); 
                visAfstand(distancejason);
                
            }
        };
    
        xhhtp.open("POST", "brewData.php?s=distance&sys=teamTrash", true);
        xhhtp.send();
        }  
       
    function visAfstand(inputData){ 
         
        let afstand=[];
        let afstandTid=[];
        for(i in inputData){
            afstand.push(inputData[i].nvalue)
            afstandTid.push(inputData[i].nobstime) 
            
        } 
    }
    
        // CO2 data.
    function co2Data(){
        var xhhtp = new XMLHttpRequest();
        xhhtp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                var co2jason = JSON.parse(this.responseText); 
                visCo2(co2jason); 
            }
         }; 
            
        xhhtp.open("POST", "brewData.php?s=CO2&sys=luftkvalitet", true);
        xhhtp.send();
        }
        
    function visCo2(inputData){
        
        let co2=[];
        let co2Tid=[];
        for(i in inputData){
            co2.push(inputData[i].nvalue)
            co2Tid.push(inputData[i].nobstime)
        }
    }
        
        // Temperatur data.
    function tempData(){
        var xhhtp = new XMLHttpRequest();
        xhhtp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                var tempjason = JSON.parse(this.responseText); 
                visTemp(tempjason); 
            }
         }; 
    
        xhhtp.open("POST", "brewData.php?s=lufttemperatur&sys=idaErin", true);
        xhhtp.send();
        }
     
    function visTemp(inputData){
        let temp=[];
        let tempTid=[];
        for(i in inputData){
            temp.push(inputData[i].nvalue)
            tempTid.push(inputData[i].nobstime)
        }
    }    
    
        // Gær(t)lås data.
    function gertData(){
        var xhhtp = new XMLHttpRequest();
        xhhtp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                var gertjason = JSON.parse(this.responseText); 
                visGert(gertjason); 
            }
         }; 
            
        xhhtp.open("POST", "brewData.php?s=jordfugtighed&sys=idaErin", true);
        xhhtp.send();
        }
    
    function visGert(inputData){
        let gert=[];
        let gertTid=[];
        for(i in inputData){
            gert.push(inputData[i].nvalue)
            gertTid.push(inputData[i].nobstime)
        }
    }        
        
        // Lyset data.
    function lysData(){
        var xhhtp = new XMLHttpRequest();
        xhhtp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                var lysjason = JSON.parse(this.responseText); 
                visLys(lysjason); 
            }
         }; 
            
        xhhtp.open("POST", "brewData.php?s=Lysindfald&sys=Luxbanden", true);
        xhhtp.send();
        }
        let lys=[];
        let lysTid=[];
    function visLys(inputData){
        
        for(i in inputData){
            lys.push(inputData[i].nvalue)
            lysTid.push(inputData[i].nobstime)
        } alert (lys[0]);
        
    }   
    
    // Henter data ved startup
    function hentData (){ 
        distanceData();
        co2Data();
        tempData();
        gertData();
        lysData();
        alert ("123 "+lys[0]);
        }
    
    hentData();
    
    // Henter hver x minut - Kommer mere senere
    setInterval (hentData, 5000);
    
    
</script>
    
</body>   
</html>