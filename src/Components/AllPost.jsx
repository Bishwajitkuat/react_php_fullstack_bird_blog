import axios from "axios";
import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import "./style.css";

const AllPost = () => {
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
        alert(respose.data.message);
        getAll();
      });
  };

  return (
    <div className="postParent">
      {posts ? (
        posts.map((item) => {
          return (
            <div className="post" key={item.id}>
              <h2>{item.title}</h2>
              <h5>Author: {item.author}</h5>
              <h5>Post id: {item.id}</h5>
              <p>
                <img className="postImg" src={item.img} alt="Bird" />{" "}
                {item.body}
              </p>
              <div className="postBtns">
                <button onClick={() => handleDelete(item.id)}> Delete </button>
                <button>
                  <Link to={`/edit/${item.id}`}>Edit</Link>
                </button>
              </div>
            </div>
          );
        })
      ) : (
        <p>
          No post found in the database. Please create new post from create link
        </p>
      )}
    </div>
  );
};

export default AllPost;
