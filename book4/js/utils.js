window.chartColors = {
	black: 'rgb(0, 0, 0)',
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(231,233,237)',
	brown: 'rgb(25,64, 64)',
	salmon: 'rgb(205, 112, 84)',
	Maroon: 'rgb(176, 48, 96)',
	VioletRed: 'rgb(205, 50, 120)',
	lightPink: 'rgb(205, 140, 149)',
	orchid: 'rgb(218, 112, 214)',
	Firebrick: 'rgb(178, 34, 34)',
	sienna: 'rgb(139, 211, 155)',
	Tan: 'rgb(255, 165, 79)',
	wheat: 'rgb(139, 126, 102)',
	Tomato: 'rgb(255, 69, 0)',
	chocolate: 'rgb(139, 69, 19)',
	plum: 'rgb(211, 160, 221)',
	slateblue: 'rgb(71, 60, 139)'
};

window.randomScalingFactor = function () {
	return(Math.random() > 0.5 ? 1.0 : 1.0) * Math.round(Math.random() * 100);
}
