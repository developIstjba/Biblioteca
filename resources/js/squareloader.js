/**
 * Author:  Jonathan
 * Created: 23 jul 2023
 */


/*
 * squareloader
 * 
 */

var squareLoaderTime = 2500;
var squareLoader = {

    load: function(){
        
        document.getElementById('squareloader').classList.remove('squareloader');
        document.getElementById('squareloader').classList.add('squareloader-show'); 
        
        return new Promise((resolve, reject)=>{
       
            setTimeout(()=>{
                document.getElementById('squareloader').classList.remove('squareloader-show');
                document.getElementById('squareloader').classList.add('squareloader');
                resolve();
            }, squareLoaderTime);
            
        });   
        
    }
        
};
