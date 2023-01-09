var valuelist = document.getElementById('valuelist');
var text = '<span> you have selected: </span>';
var listArray=[];
let count = 0;

var checkboxes = document.querySelectorAll('.checkbox');

for(var checkboxe of checkboxes)
{
    checkboxe.addEventListener('click',function()
    {
        if(this.checked == true)
        {
            count=count++;
            document.cookie=count+'='+this.value;
            listArray.push(this.value);
            valuelist.innerHTML = text + listArray.join(' / ');

        } 
        else
        {
            listArray = listArray.filter(e => e !== this.value);
            valuelist.innerHTML = text + listArray.join(' / ');

        }
    })
}