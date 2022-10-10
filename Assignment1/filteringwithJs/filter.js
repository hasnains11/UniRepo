var data=require('./data');
var fs = require('fs');
var filteredData=data.map(({name,region,population,continents,flags},index)=>{
    return `"${index+1}":{"name":"${name['official']}",
     "region":"${region}",
     "population":${population},
     "continent":"${continents[0]}",
     "flagUrl":"${flags['svg']}"}
    `;
});

//`"${index+1}":{ "name":"${name['official']}",
//     "region":"${region}",population:${population},
//     "continent":"${continents[0]}",
//     "flagUrl":"${flags['svg']}"}
//    `

filteredData="{"+filteredData+"}";
//fs.open('filteredData.txt', 'w', function (err, file) {
    
  //  if (err) throw err;
 //   console.log('Saved!');
//  });
filteredData=JSON.parse(filteredData);
//console.log(filteredData);

console.log(JSON.stringify(filteredData));

fs.writeFile('filteredData.json', JSON.stringify(filteredData), function (err) {
  if (err) throw err;
 console.log('Saved!');
});

