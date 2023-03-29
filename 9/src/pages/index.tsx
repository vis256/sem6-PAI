import Head from "next/head";
import styles from "@/styles/Home.module.css";
import NewEntry from "@/components/new";
import List from "@/components/list";
import { FormEvent, useEffect, useReducer } from "react";
import { initialTodoReducerState, todoReducer } from "@/todoReducer";
import { STORAGE_KEY } from "@/utils";

export default function Home() {
  const [todos, dispatch] = useReducer(todoReducer, initialTodoReducerState);

  const loadTodosFromStorage = () => {
    const storageContent = window.localStorage.getItem(STORAGE_KEY);

    if (storageContent === null) return;
    const storagetodos = JSON.parse(storageContent);

    dispatch({ type: "SET", todos: storagetodos });
  };

  useEffect(loadTodosFromStorage, []);

  const handleSubmit = async (event: FormEvent<HTMLFormElement>) => {
    event.preventDefault();

    const form = event.target as HTMLFormElement;

    dispatch({ type: "ADD", content: form.content.value });
  };

  return (
    <>
      <Head>
        <title>Generic React Todo</title>
        <link rel="icon" href="/favicon.ico" />
      </Head>
      <main className={styles.main}>
        <NewEntry HandleSubmit={handleSubmit}></NewEntry>
        <List Dispatch={dispatch} Todos={todos}></List>
      </main>
    </>
  );
}
