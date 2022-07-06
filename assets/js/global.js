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
		if (GAME_ID && !(["/lobby"].includes(window.location.pathname))){
			//console.log("goto lobby");
			window.location.href = "/lobby";
		}
	});


const params = new Proxy(new URLSearchParams(window.location.search), {
	get: (searchParams, prop) => searchParams.get(prop),
});

