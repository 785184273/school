 /* 每个参数的数组整合成一个数组
 * _.zip(['a', 'b'], [1, 2], [true, false]); // => [['a', 1, true], ['b', 2, false]]
 * _.zip(['a', 'b'], [1, 2, 3], [true, false]); // => [['a', 1, true], ['b', 2, false]]
 * _.zip(['a'], [1, 2, 3]); // => [['a', 1]]
 *
 */
const zip = (...arrays: any[]) => {
	var arr = [],
		aslen = arrays.length,
		marr = [],
		minIndex;
	//计数，先求出数组中长度最小的项
	for(var x = 0; x < aslen; ++x){
		marr[x] = arrays[x].length;
	}
	minIndex = Math.min.apply(Array,marr);
	var alen = arr.length = minIndex;
    for (var t = 0; t < alen; ++t) {
        arr[t] = [];
        for (var j = 0; j < aslen; ++j) {
			arr[t][j] = arrays[j][t];
        }
    }
	console.log(arr);
}
zip([1,2,3],[2,3,5],[1,2],[1])
const keyboardMiddleLine = (str: string) => {
	var keycenter = "asdfghjkl",
		str = str.toLowerCase(),
		len = str.length;
		for(var i = 0; i < len;++i){
			if(keycenter.indexOf(str.charAt(i)) < 0){
				return false;
			}
		}
		return true;
}
console.log(keyboardMiddleLine("qweadqweqadq"))
const concat = (...array: any[]) => {
	var len = array.length,
		arr = [];
	for(var i = 0;i < len;++i){
		arr = arr.concat(array[i]);
	}
	console.log(arr);
}
concat([1,2,3],[4,5,6],[233,456],["陈龙大傻逼"]);
