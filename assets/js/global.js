let ID = null;
let USER = null;
let GAME_ID = null;

fetch('/session-info')
	.then(res => res.json())
	.then(data => {
		if (data["status"] == "ok") {
			if ("game-id" in data['res']) GAME_ID = data["res"]["game-id"];
			if ("id" in data['res']) ID = data["res"]["id"];
			if ("user" in data['res']) USER = data["res"]["user"];
			try {
				wait_session();
			} catch (e) {
			}
		}
		if (GAME_ID && !(["/lobby", "/game"].includes(window.location.pathname))){
			//console.log("goto lobby");
			window.location.href = "/lobby";
		}
		if (data["res"]["host"] && ["/lobby"].includes(window.location.pathname)) {
			console.log("host");
			try {
				document.getElementById("host").style.display = "block";
			} catch (e) {

			}
		}
	});


const params = new Proxy(new URLSearchParams(window.location.search), {
	get: (searchParams, prop) => searchParams.get(prop),
});

for (let el of document.getElementsByClassName("hidden")) {
	el.style.display = "none";
}
