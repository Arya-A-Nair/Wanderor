import React from "react";
import styles from "./Home.module.css";

const Home = () => {
	return (
		<div className={styles.container}>
			<img
				className={styles.image}
				src="http://localhost/project/images/backgroundimg.png"
				alt="Your Image"
			/>
			<div className={styles.text}>
				Discover.
				<br />
				Trek.
				<br />
				Inspire.
				<br />
			</div>
			<div className={styles.belowtext}>
				"Explore, Connect, and Trek the World's Wonders”
			</div>
		</div>
	);
};

export default Home;
