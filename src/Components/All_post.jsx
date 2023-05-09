import axios from "axios";
import React, { useEffect, useState } from "react";

const All_post = () => {
  const [posts, setPosts] = useState([]);
  useEffect(() => {
    axios.get("http://localhost:8000/api/getAllPost.php").then((response) => {
      setPosts(response.data.data);
    });
  }, []);

  return (
    <div>
      {posts.map((item) => {
        return (
          <div key={item.id}>
            <h3>{item.title}</h3>
            <h5>{item.author}</h5>
            <h5>{item.id}</h5>
            <p>{item.body}</p>
          </div>
        );
      })}
    </div>
  );
};

export default All_post;
