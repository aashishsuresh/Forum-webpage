<div class="chat_wrap">
	<div class="toggle">
		</div>
	<style>
	* {
	box-sizing: border-box;
	font-family: "Noto Sans", Arial;
	margin: 0;
	padding: 0;
}

div.chat_wrap {
	bottom: 0;
	display: block;
	font-size: .85em;
	position: fixed;
	right: 3rem;
	width: 255px;
}

	div.chat_wrap > div.toggle {
		background: rgb(250,250,250);
		background: linear-gradient(to bottom, rgb(250,250,250) 0%,rgb(240,240,240) 100%);
		border: 1px solid rgba(0,0,0,.1);
		color: rgba(0,0,0,.4);
		display: none;
		font-weight: bold;
		padding: .45rem 0;
		text-align: center;
	}

		.toggle:hover {
			cursor: pointer;
		}

	div.chat {
		display: block;
	}

	div.chat > header {
		background-color: rgb(76, 102, 164);
		background: linear-gradient(to bottom, rgba(76,102,164,1) 0%,rgba(62,77,132,1) 100%);
		border: 1px solid rgba(0,0,0,.1);
		border-radius: 2px 2px 0 0;
		display: block;
		line-height: 2.25rem;
	}

		div.chat > header > h3 {
			color: rgb(255,255,255);
			display:block;
			margin: 0;
			padding: 0;
			text-align: center;
		}

	div.chat > div.chatArea {
		background: rgb(250,250,250);
		border: 1px solid rgba(0,0,0,.1);
		border-top: none;
		display: block;
		height: 160px;
		font-size: .9em;
		overflow: auto;
		padding: .25rem .65rem;
	}

		div.chat > div.chatArea > ul {
			list-style-type: none;
		}

			div.chat > div.chatArea > ul > li {
				padding: 0 0 .45rem;
			}

				div.chat > div.chatArea > ul > li.time {
					color: rgba(0,0,0,.35);
					font-size: .85em;
					font-weight: bold;
					text-align: center;
					text-transform: uppercase;
				}

	div.chat input {
		border: none;
		border: 1px solid rgba(0,0,0,.1);
		border-top: none;
		display: block;
		padding: .35rem .5rem;
		width: 100%;
	}
	</style>
	<div class="chat">
		<header>
			<h3 class="toggle">Chat</h3>
		</header>
		<div class="chatArea">
			<ul>
				<li><em>Loading...</em></li>
			</ul>
		</div>
		<form method="post">
			<input type="text" name="chat_name" id="chat_name" maxlength="15" placeholder="Name" required>
			<input type="text" name="chat_message" id="chat_message" maxlength="140" placeholder="Message" required autocomplete="off">
			<input type="hidden" name="chat_token" id="chat_token" value="<?=$token->set();?>">
		</form>
	</div>
</div>
<?php include('userhome.php');
 ?>
