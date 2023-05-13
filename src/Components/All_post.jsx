import axios from "axios";
import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";

const All_post = () => {
  const [posts, setPosts] = useState([]);

  const getAll = () => {
    axios.get("http://localhost:8000/api/getAllPost.php").then((response) => {
      setPosts(response.data.data);
    });
  };
  useEffect(() => {
    getAll();
  }, []);

  const handleDelete = (delid) => {
    axios
      .post("http://localhost:8000/api/deletePost.php", { id: delid })
      .then((respose) => {
        console.log(respose);
        // alert("deleted");
        getAll();
      });
  };

  return (
    <div>
      {posts.map((item) => {
        return (
          <div key={item.id}>
            <h3>{item.title}</h3>
            <h5>{item.author}</h5>
            <h5>{item.id}</h5>
            <p>{item.body}</p>
            <button onClick={() => handleDelete(item.id)}> Delete </button>
            <button>
              <Link to={`/edit/${item.id}`}>Edite</Link>
            </button>
          </div>
        );
      })}
    </div>
  );
};

export default All_post;
