<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostContentType;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Turbo\TurboBundle;

final class PostController extends AbstractController
{
    #[Route(path: '/post/index', name: 'post_index')]
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();

        return $this->render('post/index.html.twig',[
            'posts' => $posts,
            'published_count' => $postRepository->countPublished(),
        ]);
    }

    #[Route('/new', name: 'post_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PostRepository $postRepository): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $postRepository->save($post, true);

            return $this->redirectToRoute('post_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('post/new.html.twig', [
            'post' => $post,
            'form' => $form,
        ]);
    }

    #[Route('/newmodal', name: 'post_newmodal', methods: ['GET', 'POST'])]
    public function newmodal(Request $request, PostRepository $postRepository): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post, ['action' => $this->generateUrl('post_newmodal')]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $postRepository->save($post, true);

            return $this->redirectToRoute('post_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('post/newmodal.frame.html.twig', [
            'post' => $post,
            'form' => $form,
        ]);
    }

    #[Route('/generate', name: 'post_generate', methods: ['GET'])]
    public function generate(PostRepository $postRepository): Response
    {
        $faker = Factory::create();
        $post = Post::fromData($faker->realText(20), $faker->realText(50));
        $postRepository->save($post, true);

        return $this->redirectToRoute('post_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}', name: 'post_show', methods: ['GET'])]
    public function show(Post $post): Response
    {
        return $this->render('post/show.html.twig', [
            'post' => $post,
        ]);
    }

    #[Route('/{id}/edit', name: 'post_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Post $post, PostRepository $postRepository): Response
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $postRepository->save($post, true);

            return $this->redirectToRoute('post_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('post/edit.html.twig', [
            'post' => $post,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit-content', name: 'post_editcontent', methods: ['GET', 'POST'])]
    public function editContent(Request $request, Post $post, PostRepository $postRepository): Response
    {
        $form = $this->createForm(
            PostContentType::class,
            $post,
            ['action' => $this->generateUrl('post_editcontent', ['id' => $post->getId()])],
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $postRepository->save($post, true);

            return $this->redirectToRoute('post_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('post/edit-content.frame.html.twig', [
            'post' => $post,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'post_delete', methods: ['POST'])]
    public function delete(Request $request, Post $post, PostRepository $postRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $post->getId(), $request->request->get('_token'))) {
            $postRepository->remove($post, true);
        }

        return $this->redirectToRoute('post_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/publish', name: 'post_publish', methods: ['POST'])]
    public function publish(Request $request, Post $post, PostRepository $postRepository): Response
    {
        $post->publish();
        $postRepository->save($post, true);
        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);

        return $this->render('post/on_publish.stream.html.twig', [
            'post'            => $post,
            'published_count' => $postRepository->countPublished(),
        ]);
    }

    #[Route('/{id}/unpublish', name: 'post_unpublish', methods: ['POST'])]
    public function unpublish(Request $request, Post $post, PostRepository $postRepository): Response
    {
        $post->unpublish();
        $postRepository->save($post, true);
        $request->setRequestFormat(TurboBundle::STREAM_FORMAT);

        return $this->render('post/on_publish.stream.html.twig', [
            'post'            => $post,
            'published_count' => $postRepository->countPublished(),
        ]);
    }
}
