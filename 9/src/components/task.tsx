import styles from "@/styles/Task.module.css";
import { Todo } from "@/todoReducer";

export default function Task(props: { Todo: Todo; Dispatch: any }) {
  const changeState = (): void => {
    props.Dispatch({ type: "TOGGLE", key: props.Todo.key });
  };

  const remove = (): void => {
    props.Dispatch({ type: "REMOVE", key: props.Todo.key });
  };

  return (
    <div className={styles.task}>
      <div className={styles.finishButton}>
        [
        <button onClick={changeState}>{props.Todo.finished ? "X" : "_"}</button>
        ]
      </div>
      <div
        className={`${styles.content} ${
          props.Todo.finished ? styles.finished : ""
        }`}
      >
        {props.Todo.content}
      </div>
      <button onClick={remove} className={styles.removeButton}>
        X
      </button>
    </div>
  );
}
