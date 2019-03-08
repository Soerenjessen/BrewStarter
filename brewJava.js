    //var inter = document.getElementById(inter).value;

        // Distance data.
    function distanceData(){
        var xhhtp = new XMLHttpRequest();
        xhhtp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                var distancejason = JSON.parse(this.responseText); 
                visAfstand(distancejason); 
            }
        };
    
        xhhtp.open("POST", "brewData.php?s=distance&sys=teamTrash&inter="+inter, true);
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
            
        xhhtp.open("POST", "brewData.php?s=CO2&sys=luftkvalitet&inter="+inter, true);
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
    
        xhhtp.open("POST", "brewData.php?s=lufttemperatur&sys=idaErin&inter="+inter, true);
        xhhtp.send();
        }
     
    function visTemp(inputData){
        let temp=[];
        let tempTid=[];
        for(i in inputData){
            CO2.push(inputData[i].nvalue)
            CO2tid.push(inputData[i].nobstime)
        }
    }    
    
        // Gær(t)lås data.
    function gertData(){
        var xhhtp = new XMLHttpRequest();
        xhhtp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                var gertjason = JSON.parse(this.responseText); 
                visgert(gertjason); 
            }
         }; 
            
        xhhtp.open("POST", "brewData.php?s=jordfugtighed&sys=idaErin&inter="+inter, true);
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
            
        xhhtp.open("POST", "brewData.php?s=Lysindfald&sys=Luxbanden&inter="+inter, true);
        xhhtp.send();
        }
        
    function visLys(inputData){
        let lys=[];
        let lysTid=[];
        for(i in inputData){
            lys.push(inputData[i].nvalue)
            lysTid.push(inputData[i].nobstime)
        }
    }   
    
    // Henter data ved startup
    function hentData (){
        distanceData();
        co2Data();
        tempData();
        gertData();
        lysData();
        } 
 
    hentData();
    // Henter hver x minut - Kommer mere senere
    setInterval (hentData, 5000);