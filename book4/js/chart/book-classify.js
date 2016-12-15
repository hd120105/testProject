/**
 *  图书分类饼图
 *  @author: YangK
 */
;(function () {
var malie = document.getElementById("A").getAttribute('value');
var zhezong = document.getElementById("B").getAttribute('value');
var sheke = document.getElementById("C").getAttribute('value');
var zhengfa = document.getElementById("D").getAttribute('value');
var junshi = document.getElementById("E").getAttribute('value');
var jingji = document.getElementById("F").getAttribute('value');
var wkjt = document.getElementById("G").getAttribute('value');
var yuwen = document.getElementById("H").getAttribute('value');
var wenxue = document.getElementById("I").getAttribute('value');
var yishu = document.getElementById("J").getAttribute('value');
var lidi = document.getElementById("K").getAttribute('value');
var zike = document.getElementById("N").getAttribute('value');
var shulihua = document.getElementById("O").getAttribute('value');
var tiandi = document.getElementById("P").getAttribute('value');
var shengke = document.getElementById("Q").getAttribute('value');
var yiwei = document.getElementById("R").getAttribute('value');
var nongke = document.getElementById("S").getAttribute('value');
var gongji = document.getElementById("T").getAttribute('value');
var jiaoyun = document.getElementById("U").getAttribute('value');
var hangtian = document.getElementById("V").getAttribute('value');
var huanke= document.getElementById("X").getAttribute('value');
var zonghe = document.getElementById("Z").getAttribute('value');

var config = {
    type: 'pie',
    data: {
        datasets: [{
            data: [
				wenxue,
                gongji,
				jingji,
				lidi,
				zhengfa,
				yuwen,
				zhezong,
				shulihua,
				wkjt,
				yishu,
				sheke,
				shengke,
				tiandi,
				yiwei,
				huanke,
				malie,
                zonghe ,
                zike,
				junshi,
                nongke,
                hangtian,
                jiaoyun            
            ],
            backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.yellow,
                window.chartColors.green,
                window.chartColors.blue,
				window.chartColors.purple,
				window.chartColors.brown,
                window.chartColors.grey,
                window.chartColors.salmon,
                window.chartColors.VioletRed,	 
				window.chartColors.blue,
				window.chartColors.lightPink,
				window.chartColors.orchid,
                window.chartColors.Firebrick,
                window.chartColors.sienna,
                window.chartColors.Tan,
                window.chartColors.Maroon,
				window.chartColors.wheat,
				window.chartColors.Tomato,
                window.chartColors.chocolate,
                window.chartColors.plum,
				window.chartColors.green,
                window.chartColors.slateblue
             
				
            ],
            label: 'Dataset 1'
        }],
        labels: [
            "文学",
			"工业技术",
			"经济",
			"历史、地理",
			"政治、法律",
			"语言、文字",
			"哲学、宗教",
			"数理科学与化学",
			"文化、科学、教育、体育",
			"艺术",
			"社会科学总论",
			"生物科学",
			"天文学、地球科学",
			"医药、卫生",
			"环境科学，安全科学",			
			"马列主义、毛泽东思想、邓小平理论",
            "综合性图书",
            "自然科学总论",          
            "军事",
			"农业科学",
			"航空、航天",
			"交通运输"	
        ]
    },
    options: {
        responsive: true,
		title: {
                    display: true,
                    text: '图书分类展示（%）'
                }
    }
};

    (function() {
    var ctx = document.getElementById("chart-area").getContext("2d");
    window.myPie = new Chart(ctx, config);
})();


})();

/**
 * Created by Administrator on 2016/10/28.
 */
(function () {
    var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var color = Chart.helpers.color;
    var barChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: 'Dataset 1',
            backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
            ]
        }, {
            label: 'Dataset 2',
            backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
            ]
        }]

    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: '男女借阅图书数量对比'
                }
            }
        });

    };

})();

(function () {
    var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var config = {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ],
                fill: false
            }, {
                label: "My Second dataset",
                fill: false,
                backgroundColor: window.chartColors.blue,
                borderColor: window.chartColors.blue,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ],
            }]
        },
        options: {
            responsive: true,
            title:{
                display:true,
                text:'每月图书借阅总量'
            },
            tooltips: {
                mode: 'index',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            }
        }
    };

    (function() {
        var ctx = document.getElementById("canvas-line").getContext("2d");
        window.myLine = new Chart(ctx, config);
    })();

})();

(function () {
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var chartColors = window.chartColors;
    var color = Chart.helpers.color;
    var config = {
        data: {
            datasets: [{
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
                backgroundColor: [
                    color(chartColors.red).alpha(0.5).rgbString(),
                    color(chartColors.orange).alpha(0.5).rgbString(),
                    color(chartColors.yellow).alpha(0.5).rgbString(),
                    color(chartColors.green).alpha(0.5).rgbString(),
                    color(chartColors.blue).alpha(0.5).rgbString(),
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                "Red",
                "Orange",
                "Yellow",
                "Green",
                "Blue"
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'right',
            },
            title: {
                display: true,
                text: '各专业图书借阅量'
            },
            scale: {
                ticks: {
                    beginAtZero: true
                },
                reverse: false
            },
            animation: {
                animateRotate: false,
                animateScale: true
            }
        }
    };

    (function() {
        var ctx = document.getElementById("chart-roder-area");
        window.myPolarArea = Chart.PolarArea(ctx, config);
    })();

})();
/**
 * Created by Administrator on 2016/10/28.
 */

(function () {
    var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var progress = document.getElementById('animationProgress');
    var config = {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                fill: false,
                borderColor: window.chartColors.red,
                backgroundColor: window.chartColors.red,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ]
            }, {
                label: "My Second dataset ",
                fill: false,
                borderColor: window.chartColors.blue,
                backgroundColor: window.chartColors.blue,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ]
            }]
        },
        options: {
            title:{
                display:true,
                text: ""
            },
            animation: {
                duration: 2000,
                onProgress: function(animation) {
                    progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                },
                onComplete: function(animation) {
                    window.setTimeout(function() {
                        progress.value = 0;
                    }, 2000);
                }
            }
        }
    };

    (function() {
        var ctx = document.getElementById("canvas-zhuanye").getContext("2d");
        window.myLine = new Chart(ctx, config);
    })();

})();
