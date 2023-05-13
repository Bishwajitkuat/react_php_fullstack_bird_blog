import { useState, React, useEffect } from "react";
import axios from "axios";
import { useParams } from "react-router-dom";

const Edite_post = () => {
  const [id, setId] = useState(useParams().id);
  const [title, setTitle] = useState("");
  const [body, setBody] = useState("");
  const [author, setAuthor] = useState("");
  const [category, setCategory] = useState("");
  const [img, setImg] = useState("");

  const getById = (id) => {
    axios
      .get(`http://localhost:8000/api/getById.php?id=${id}`)
      .then((response) => {
        const post = response.data;
        setId(post.id);
        setTitle(post.title);
        setBody(post.body);
        setAuthor(post.author);
        setImg(post.img);
        setCategory(post.category);
      });
  };
  useEffect(() => {
    getById(id);
  }, []);
  const updateHandler = (e) => {
    e.preventDefault();
    axios
      .patch("http://localhost:8000/api/updatePost.php", {
        id: id,
        title: title,
        body: body,
        author: author,
        category: category,
        img: img,
      })
      .then((response) => alert(response.data.message));
  };

  return (
    <div className="App">
      <form onSubmit={updateHandler}>
        <div>
          <label htmlFor="title">title</label>
          <input
            type="text"
            name="title"
            onChange={(e) => setTitle(e.target.value)}
            value={title}
            id="title"
          />
        </div>
        <div>
          <label htmlFor="body">Body</label>
          <input
            type="textarea"
            name="body"
            onChange={(e) => setBody(e.target.value)}
            id="body"
            value={body}
          />
        </div>
        <div>
          <label htmlFor="author">Author</label>
          <input
            type="text"
            name="author"
            onChange={(e) => setAuthor(e.target.value)}
            id="author"
            value={author}
          />
        </div>
        <div>
          <label htmlFor="category">Catetory</label>
          <input
            type="text"
            name="category"
            onChange={(e) => setCategory(e.target.value)}
            id="category"
            value={category}
          />
        </div>
        <div>
          <label htmlFor="img">Img address</label>
          <input
            type="text"
            name="img"
            onChange={(e) => setImg(e.target.value)}
            id="img"
            value={img}
          />
        </div>
        <input type="submit" value="Save" />
      </form>
    </div>
  );
};

export default Edite_post;
